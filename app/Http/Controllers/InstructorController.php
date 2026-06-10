<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from users
        //
        // $users = User::orderBy('id', 'desc')->get;
        // $users = User::latest()->get();

        // $instructors = instructor::with('major')->orderByDesc('id')->get();
        // return $instructors;
        // dd($instructors);

        $instructors = Instructor::with('major', 'user')->orderByDesc('id')->get();
        $title = 'Instructor Management';
        return view('instructor.index', compact('instructors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create New Instructor";
        $majors = Majors::get();
        return view('instructor.create', compact('title', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'major_id' => 'required',
            'name' => 'required',
            'phone' => 'nullable'
        ]);

        DB::beginTransaction();
        try {
            // Insert User
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            // Insert Student
            Instructor::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'major_id' => $request->major_id,
                'phone' => $request->phone
            ]);
            DB::commit();
            Alert::success('Success!', 'Create New Instructor Success!');
            // toast('Your student Has Been Created!', 'success');

            return redirect()->to('instructor');
        } catch (\Throwable $th) {
            DB::rollBack();
            // return $th->getMessage();
            Alert::error('Fail!', $th->getMessage());
            return back()->withInput();
        }
        //
        Instructor::create($request->all());
        Alert::success('Success!', 'Create New instructor Success!');
        // toast('Your instructor Has Been Created!', 'success');

        return redirect()->to('instructor');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'Edit Instructor';
        $majors = Majors::get();
        $edit = Instructor::find($id); //kalo gabisa blank
        // $edit = User::findOrFail($id); //kalo gabisa 404
        return view('instructor.edit', compact('title', 'edit', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        DB::beginTransaction();
        try {
            $dataUser = ['name' => $request->name, 'email' => $request->email];

            $user = $instructor->user;
            // Jika User ingin mengganti password
            if ($request->filled('password')) {
                $dataUser['password'] = $request->password;
            }

            $user->update($dataUser);

            $data = [
                'major_id' => $request->major_id,
                'name' => $request->name,
                'phone' => $request->phone
            ];

            // Jika model dideclare di bawah
            // student::find($id)->update($data);

            // Jika model disimpen di atas (function) / route binding
            $instructor->update($data);
            DB::commit();
            return redirect()->to('instructor');
        } catch (\Throwable $th) {
            DB::rollBack();
            // return $th->getMessage();
            Alert::error('Fail!', $th->getMessage());
            return back()->withInput();
        };

        // $data = [
        //     'major_id' => $request->major_id,
        //     'name' => $request->name,
        //     'phone' => $request->phone
        // ];

        // Instructor::find($id)->update($data);
        // return redirect()->to('instructor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
        try {
            $instructor->user()->delete();
            return redirect()->to('student');
        } catch (\Throwable $th) {
            DB::rollBack();
            // return $th->getMessage();
            Alert::error('Fail!', $th->getMessage());
            return back();
        }

        // Instructor::find($id)->delete();
        // return redirect()->to('instructor');
    }
}
