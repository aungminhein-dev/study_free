<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Routing\Controllers\Middleware;
// use Illuminate\Routing\Controllers\HasMiddleware;

class RolePermissionController extends Controller
{
    // public static function middleware(): array
    // {
    //     return [
    //         'role:admin',
    //     ];
    // }

    public function index()
    {
        $roles = Role::all();
        return view('auth.manage-roles.index', compact('roles'));
    }

    public function create()
    {
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
        $role = Role::create(['name' => strtolower($request->input('roleName'))]);
        if ($request->has('permissions')) {
            $permissions = $request->input('permissions');
            $role->syncPermissions($permissions);
        }
        return to_route('manage-roles.index')->with('success', 'Role created successfully.');
    }
    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('auth.manage-roles.show', compact('role', 'permissions'));
    }

    public function edit($id)
    {
        // Retrieve all permissions and associated permissions for the given role
        $permissions = Permission::all()->groupBy(function ($permission) {
            $parts = explode(' ', $permission->name);
            return $parts[1] ?? 'general'; // Group by entity, default to 'general'
        });
        $role = Role::findOrFail($id);
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('auth.manage-roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $roleId)
    {
        $role = Role::find($roleId);
        $validated = $request->validate([
            'roleName' => [
                'required',
                Rule::unique('roles', 'name')->ignore($role->id),
            ],
            'permissions' => 'required|array',
        ]);

        $role->update(['name' => $validated['roleName']]);
        $role->syncPermissions($validated['permissions']);

        return to_route('manage-roles.index')->with('success', 'Role updated successfully.');
    }


    public function destroy($role_id)
    {
        Role::findById($role_id)->delete();
        return to_route('manage-roles.index')->with('success', 'Role deleted successfully.');
    }
}
