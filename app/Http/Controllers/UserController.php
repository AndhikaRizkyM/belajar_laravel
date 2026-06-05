<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Select * from users
        // latest = Desc, oldest = asc
        // $users = User::OrderBy('id', 'DESC')->get();
        // $users = User::orderByDesc()->get();
        $users = User::latest()->get();
        $title = 'User Management';
        return view('user.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->get();

        $title = 'Create New User';
        return view('user.create', compact('users', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert into users () values ()
        User::create($request->all());
        return redirect()->to('user');
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
        $title = 'Edit User';
        $edit = User::find($id); // semisal id ga ketemu hasilnya blank
        // $edit = User::findOrFail($id); // semisal id ga ketemu hasilnya 404 Not Found
        return view('user.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        // Jika user memasukkan password
        if (filled($request->password)) {
            $data['password'] = $request->password;
        }

        User::find($id)->update($data);
        return redirect()->to('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
