<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
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
        $deleteTitle = "Delete User!";
        $deleteText = 'Are you sure want delete this User?';
        $users = User::orderByDesc('id')->get();
        $title = 'User Management';
        return view('user.index', compact('users', 'title', 'deleteTitle', 'deleteText'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create New User";
        $roles = Role::get();
        return view('user.create', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6'
        // ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            // User Role akan  di-sync dengan request role_id yang dipilih
            $user->roles()->sync($request->role_ids);

            DB::commit();
            Alert::success('Success!!', 'Created User Success');
            // toast('Your User Has Been Created!', 'success');

            return redirect()->to('user');
        } catch (\Throwable $th) {
            // return $th->getMessage();
            DB::rollBack();
            Alert::error('Failed!', "An Error Occurred While Saving the User");
            return back()->withInput();
        }
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
        $title = 'Edit User';
        $roles = Role::get();
        $edit = User::find($id); //kalo gabisa blank
        // $edit = User::findOrFail($id); //kalo gabisa 404
        return view('user.edit', compact('title', 'edit', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            //jika user memasukan password
            if (filled($request->password)) {
                $data['password'] = $request->password;
            }

            $user = User::find($id);
            $user->update($data);
            $user->roles()->sync($request->role_ids);
            DB::commit();
            Alert::success('Success!', 'User has been updated!');
            return redirect()->to('user');
        } catch (\Throwable $th) {
            return $th->getMessage();
            DB::rollBack();
            Alert::error('Failed!', 'Update Failed');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        Alert::success('Success!', 'User has been deleted!');
        return redirect()->to('user');
    }
}
