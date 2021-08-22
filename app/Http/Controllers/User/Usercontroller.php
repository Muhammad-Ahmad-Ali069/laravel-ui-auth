<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:5|max:30',
            'cpassword'=> 'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save)
        {
            return redirect()->back()->with('success', 'You are now successfully registered');
        }
        else
        {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register user');
        }

    }

    public function check(Request $request)
    {
        $user = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:5|max:30',
        ]);

        $creds = $request->only('email', 'password');

        
            if(Auth::guard('admin')->attempt($creds))
            {
                return redirect()->route('admin.home');
            }
       
            if(Auth::guard('web')->attempt($creds))
            {
                return redirect()->route('user.home');
            }
            else
            {
                return redirect()->route('user.home')->with('fail', 'Inncorrect credentials');
            }
        
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
