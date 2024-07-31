<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home()
    {
        return view('welcome');
    }


    public function blogs()
    {
        return view('guest.blog');
    }

    public function courses()
    {
        return view('guest.course');
    }

    public function about()
    {
        return view('guest.about');
    }
}
