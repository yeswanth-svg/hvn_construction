<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => "required",
            ]
        );

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->guard_name = 'web';

        $permission->save();
        // Clear the permission cache to reflect changes immediately
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $per = Permission::findOrFail($id);
        $per->name = $request->name;
        $per->guard_name = 'web';

        $per->update();
        // Clear the permission cache to reflect changes immediately
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $per = Permission::findOrFail($id);

        $per->delete();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully');

    }

    public function assign()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.permissions.assign', compact('roles', 'permissions'));
    }

    public function storeAssignment(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($request->role_id);
        $role->permissions()->syncWithoutDetaching($request->permissions);


        // Clear the permission cache to reflect changes immediately
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        return redirect()->route('admin.permissions.index')->with('success', 'Permissions assigned successfully!');
    }
}
