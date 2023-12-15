<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('user', ['users' => $users]);
    }

    public function details($id)
    {
        $user = User::find($id);
        return view('users.details', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function viewDetails($id)
    {
        $user = User::findOrFail($id);
        return view('users.view-user-details', compact('user'));
    }

    public function index() 
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);       
    }

    public function registeredUser()
    {   
        $registeredUser = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUsers' => $registeredUser]);    
    }

    public function show($slug)
    {
        $user =   User::where('slug', $slug)->first();
        return view('user-detail', ['user' => $user]);
    }

    public function approve($slug)
    {
        $user =   User::where('slug', $slug)->first();
        $user->status ='active';
        $user->save();
        return redirect('user-detail/'.$slug)->with('status', 'User Approved Successfully!');
    }

    public function delete($slug)
    {
        $user =   User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user =   User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'User Deleted Successfully!');
    }

    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->get();
        return view('user-banned', ['bannedUsers' => $bannedUsers]); 
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'User Restored Successfully!');
    }
}
