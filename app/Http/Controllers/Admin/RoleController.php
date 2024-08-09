<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect('roles')->with('success', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        return redirect('roles')->with('success', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('roles')->with('success', 'Role deleted successfully');
    }

    // Add / Edit Roles Permissions System
    public function permissions(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('name')->toArray(); // Fetch permission names
        return view('admin.roles.permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function attachPermissions(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return redirect('roles')->with('success', 'Permissions attached to role successfully');
    }

    public function detachPermission(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission->name);
        return redirect()->back()->with('success', 'Permission revoked from role successfully');
    }
}
