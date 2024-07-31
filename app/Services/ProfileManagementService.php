<?php

namespace App\Http\Serivces;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileManagementService
{
    public function validateInputs($request)
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'in:male,female,secret'],
            'birthday' => ['nullable', 'date']
        ]);
    }

    public function updateProfileData($request)
    {
        return User::where('id', auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
        ]);
    }
}
