<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lockers = Locker::orderBy('id')->get();
        // $lockers = Locker::all();
        $title = 'Locker Management';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('locker.index', compact('lockers', 'title', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create New Locker';
        return view('locker.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'locker_name' => 'required|unique:lockers,locker_name',
            'batch' => 'required|in:1,2,3,4',
            'major' => 'required|in:Web Programming,Content Creator,Multimedia',
            'status' => 'required|in:Available,Unavailable,Damaged,Missing'
        ]);

        // Untuk insert into ke db bisa menggunakan request all (jika name pada form html sesuai dengan db)
        Locker::create($request->all());

        // Untuk insert into ke db bisa menggunakan create manual (jika name pada form html berbeda dengan db)
        // \App\Models\Locker::create([
        //     'locker_name' => $request->locker_name,
        //     'batch' => $request->batch,
        //     'major' => $request->major,
        //     'status' => $request->status
        // ]);

        Alert::success('Success!', 'Your Locker has Been Created!');
        // toast('Your Locker Has Been Created!', 'success');

        return redirect()->to('locker');
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
        $title = 'Edit Locker';
        $edit = Locker::find($id); //kalo gabisa blank
        // $edit = User::findOrFail($id); //kalo gabisa 404
        return view('locker.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'locker_name' => 'required|' . Rule::unique("lockers", "locker_name")->ignore($id),
            'batch' => 'required|in:1,2,3,4',
            'major' => 'required|in:Web Programming,Content Creator,Multimedia',
            'status' => 'required|in:Available,Unavailable,Damaged,Missing'
        ]);

        $data = Locker::find($id);
        $data->update(
            $request->all()
        );
        Alert::success('Success!', 'Your Locker has Been Edited!');
        return redirect()->route('locker.index');


        // $data = [
        //     'locker_name' => $request->locker_name,
        //     'batch' => $request->batch,
        //     'major' => $request->major,
        //     'status' => $request->status
        // ];
        // Locker::find($id)->update($data);
        // return redirect()->to('locker');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Locker::find($id)->delete();
        Alert::success('Success!', 'Your Locker has Been Deleted!');
        return redirect()->to('locker');
    }
}
