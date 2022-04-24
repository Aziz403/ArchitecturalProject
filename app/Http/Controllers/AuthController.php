<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(){
        return view('admin.login');
    }

    public function postLogin(Request $request) {

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $notification = ['alert-type' => 'success' , 'message' => 'Logged in successfully'];

            return redirect()->route('admin.home')->with($notification);       
        }

        $notification = ['alert-type' => 'error' , 'message' => 'Invalid login data'];
        
        return redirect()->back()->with($notification);
    }


    public function profile(){
        return view('admin.profile');
    }


    public function editProfile(){
        return view('admin.update_info');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);

        $admin = User::where('username' , Auth::user()->username)->first();

        if(!Hash::check($request->old_password , $admin->password)){
            $notification = ['alert-type' => 'error' , 'message' => 'Old password doesnt match!'];

            return redirect()->back()->with($notification);
        }

        $admin->update([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        $notification = ['alert-type' => 'success' , 'message' => 'Your password updated successfully'];


        return redirect()->route('admin.profile')->with($notification);


    }


    public function logout()
    {
        Auth::logout();
        $flash = ['alert-type' => 'success' , 'message' => 'Logged out successfully'];
        return redirect()->route('admin.login')->with($flash);
    }

}
