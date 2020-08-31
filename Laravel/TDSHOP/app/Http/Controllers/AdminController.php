<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.login');
    }
    public function loginAdmin(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        $arr = [
            'email' => $request-> email,
            'password' => $request->password
        ];
        // dd($arr);
        if(Auth::attempt($arr)){
            return redirect()->intended('dashboard');
        } else{
            return redirect('admin')->with('status','Tài khoản hoặc mật khẩu bị sai!!!');
        }
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->intended('admin');
    }

}
