<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;


class AuthController extends Controller
{
    public function login()
    {
        return \view('admin.auth.login');
    }



    public function makeLogin(Request $request)
    {
        // return $request;
        $remmberMe = $request->has('remember_me') ? true : false;
       
        if(auth()->guard('admin')->attempt(['email' =>$request->email,'password' =>$request->password]))
        {
            return redirect()->route('admin.DashBoard');
        }else
        {
            return back();
        }
       
    }

   

    public function logout()
    {
        \auth('admin')->logout();
        return \redirect()->route('admin.log');
    }
}
