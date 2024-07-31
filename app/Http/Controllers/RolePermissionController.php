<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('auth.manage-roles.index', compact('roles'));
    }

    public function create()
    {
        // Fetch all permissions
        $permissions = Permission::all()->groupBy(function ($permission) {
            $parts = explode(' ', $permission->name);
            return $parts[1] ?? 'general'; // Group by entity, default to 'general'
        });
        // dd($permissions->toArray());
        return view('auth.manage-roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'roleName' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => [
                'required',
                'string',
                Rule::exists('permissions', 'name')->where(function ($query) {
                    $query->where('guard_name', 'web'); // or 'sanctum' or other guard if applicable
                }),
            ],
        ]);

        // Create the new role
        $role = Role::create(['name' => $request->input('roleName')]);
        if ($request->has('permissions')) {
            $permissions = $request->input('permissions');
            $role->syncPermissions($permissions);
        }

        // Redirect back with success message
        return to_route('manage-roles.index')->with('success', 'Role created successfully.');
    }


    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('auth.manage-roles.show', compact('role', 'permissions'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('auth.manage-roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        $role->update(['name' => $validated['name']]);
        $role->syncPermissions($validated['permissions']);

        return to_route('manage-roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($role_id)
    {
        Role::findById($role_id)->delete();
        return to_route('manage-roles.index')->with('success', 'Role deleted successfully.');
    }
}
