<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use RealRashid\SweetAlert\Facades\Alert;


class UserRoleController extends Controller
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

        // User Role menyambungkan table user dengan role dan menampilkan object (menggunakan ORM)
        $UserRoles = UserRole::with('user', 'role')->orderByDesc('id')->get();
        $title = 'User Role Management';
        return view('user-role.index', compact('UserRoles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::get();
        $roles = Role::get();
        $title = "Create New User Role";
        return view('user-role.create', compact('title', 'users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required',
            'role_id' => 'required'
        ]);


        //
        UserRole::create($request->all());
        Alert::success('Success!', 'Your Role has Been Created!');
        // toast('Your Role Has Been Created!', 'success');

        return redirect()->to('user-role');
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
        $title = 'Edit Role';
        $edit = Role::find($id); //kalo gabisa blank
        // $edit = User::findOrFail($id); //kalo gabisa 404
        return view('user-role.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active
        ];

        Role::find($id)->update($data);
        return redirect()->to('user-role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Role::find($id)->delete();
        return redirect()->to('user-role');
    }
}
