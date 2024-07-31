<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function profile($id)
    {
        $user = User::where('id',$id)->get();
        return view('authenticated_user.profile',compact('user'));
    }
}
