<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $menus = Menu::all();
        // $menus = Menu::with('parent')->orderBy('sort_order')->get();
        $roles = Role::all();

        return view('menu.index', compact('menus', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        // $parents = Menu::where('parent_id', '=', null)->get();
        $parents = Menu::whereNull('parent_id')->get();
        $title = 'Create New Menu';
        return view('menu.create', compact('title', 'roles', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'parent_id' => 'nullable|exists:menus,id',
            'name' => 'required',
            'icon' => 'nullable',
            'url' => 'nullable',
            'sort_order' => 'nullable',
            'is_active' => 'required|boolean',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id'
        ]);

        $menu = Menu::create($validate);
        if ($request->roles) {
            $menu->roles()->attach($request->roles);
        }

        Alert::success('Success!', 'Create New Menu Success!');
        return redirect()->route('menu.index');
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
        $menu = Menu::find($id);
        $roles = Role::all();
        $parents = Menu::where('parent_id', '=', null)
            ->where('id', '!=', $menu->id)
            ->get();

        // $menuRoles = mengambil id pada Roles yang terhubung dengan table menus
        $menuRoles = $menu->roles->pluck('id')->toarray();
        return view('menu.edit', compact('menu', 'roles', 'parents', 'menuRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        // $menu = Menu::find($id);
        $validate = $request->validate([
            'parent_id' => 'nullable|exists:menus,id',
            'name' => 'required',
            'icon' => 'nullable',
            'url' => 'nullable',
            'sort_order' => 'nullable',
            'is_active' => 'required|boolean',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id'
        ]);
        $menu->update($validate);
        $menu->roles()->sync($validate['roles']);

        Alert::success('Success!', 'Menu updated successfully!');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        // hapus relasi roles dulu (pivot table)
        $menu->roles()->detach();

        // hapus menu
        $menu->delete();

        Alert::success('Success!', 'Menu deleted successfully!');

        return redirect()->route('menu.index');
    }
}
