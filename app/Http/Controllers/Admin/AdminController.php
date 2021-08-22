<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|exists:admins,email',
            'password'=> 'required|min:5|max:30',
        ]);

        $creds = $request->only('email', 'password');

        if(Auth::guard('admin')->attempt($creds))
        {
            return redirect()->route('admin.home');
        }
        else
        {
            return redirect()->route('admin.home')->with('fail', 'Inncorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
