<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        //$request->session()->flush();
        return view('profile');
    }

    public function index() 
    {
        return view('user');   
    }
}
