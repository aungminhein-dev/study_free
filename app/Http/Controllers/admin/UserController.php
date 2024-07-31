<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Throwable;

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
        return view('auth.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $encodedId)
    {

        try {
            $user = User::where('id', base64_decode($encodedId))->first();
            $request->validate([
                'name' => 'required',
                'email' => 'unique:users,email,' . $user->id,
                'username' => 'required|string|max:250',
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender
            ];

            $user->update($data);

            // $role = Role::findOrFail($request->role_id);
            // $user->syncRoles($role);
            return back();
        } catch (Throwable $th) {
            dd($th);
        };
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
