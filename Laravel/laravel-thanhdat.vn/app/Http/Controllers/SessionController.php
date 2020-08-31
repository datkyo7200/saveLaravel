<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function add(Request $request)
    {
        // $request->session()->put('username','Phan Thanh Dat');
        // $request->session()->put('login',true);
        session(['username'=>'thanhdat']);
    }
    public function show(Request $request)
    {
        // return $request->session()->all();
        // if ($request->session()->get('username')) {
        //     echo " Đã lưu username vào session";
        // }
        // return $request->session()->get('username');
        return session('username');
        // return $request->session()->get('status');
    }
    public function add_flash(Request $request)
    {
        $request->session()->flash('status','Bạn đã thêm sản phẩm thành công');
    }
    public function delete(Request $request)
    {
        $request->session()->forget('username');
        $request->session()->flush();
    }
}
