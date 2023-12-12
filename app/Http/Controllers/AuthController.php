<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        return view('login');
    }

    public function register() 
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Check if login is successful
        if (Auth::attempt($credentials)) {
            // Check user status
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', "Your Account isn't activated yet, please contact the Admin!");
                return redirect('/login');
            }
            
            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }
            if (Auth::user()->role_id == 2) {
                return redirect('profile'); // Add a semicolon here
            }
            //$request->session()->regenerate();
            //return redirect();
        }

        Session::flash('status', 'failed');
        Session::flash('message', "Your Login Credentials Are Invalid!");
        return redirect('/login');
    }
    
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');    
    }

    public function registerProcess(Request $request) 
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        // Hash the password securely
        $hashedPassword = Hash::make($request->password);

        // Create a new user with the pending status
        $user = User::create([
            'username' => $request->username,
            'password' => $hashedPassword,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'pending', // Set the initial status to "pending"
        ]);

        // Display a green box with the success message
        Session::flash('status', 'success');
        Session::flash('message', 'Registration Success, wait for admin approval');
        return redirect('register');
    }
}
