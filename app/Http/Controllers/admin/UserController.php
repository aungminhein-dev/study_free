<?php

namespace App\Http\Controllers\admin;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('auth.user.list', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('auth.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'unique:users,email',
                'username' => 'required|string|max:250',
                'password' => 'required',
                'roleId' => 'required|exists:roles,id', // Validate that the role ID exists
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'gender' => $request->gender
            ];

            $user = User::create($data);

            $role = Role::findOrFail($request->roleId);
            $user->assignRole($role);
            return redirect()->route('admin.users-list');
        } catch (Throwable $th) {
            return response()->json($th);
        }
    }
    public function edit($encodedId)
    {
        $roles = Role::all();
        $userId = base64_decode($encodedId);
        $user = User::findOrFail($userId);
        $roles = Role::all(); // Get all available roles
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('auth.user.edit', compact('user', 'roles','userRoles'));
    }

    public function update(Request $request, $encodedId)
{
    try {
        // Decode the user ID and find the user
        $userId = base64_decode($encodedId);
        $user = User::findOrFail($userId); // Ensure the user exists

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|string|max:250',
            'roles' => 'array|exists:roles,id', // Ensure the roles field is an array and all role IDs exist
        ]);

        // Prepare the data for user update
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender')
        ];

        // Update the user information
        $user->update($data);

        // Sync roles
        $roleIds = $request->input('roles', []); // Get the array of role IDs
        $roles = Role::whereIn('id', $roleIds)->get(); // Fetch the roles
        $user->syncRoles($roles); // Sync roles to the user

        return redirect()->back()->with('success', 'User updated successfully.');

    } catch (Throwable $th) {
        // Log the error and return a friendly message
        Log::error('User update failed: ' . $th->getMessage());
        return redirect()->back()->with('error', 'Failed to update user. Please try again.');
    }
}

    public function destroy($encodedId)
    {
        try {
            $user = User::where('id', base64_decode($encodedId))->first();
            $user->delete();
            return redirect()->route('admin.users-list');
        } catch (Throwable $th) {
            return $th;
        }
    }

    public function details($encodedId)
    {
        $userId = base64_decode($encodedId);
        $user = User::with('roles')->where('id', $userId)->first();
        return view('auth.user.details', compact('user'));
    }
}
