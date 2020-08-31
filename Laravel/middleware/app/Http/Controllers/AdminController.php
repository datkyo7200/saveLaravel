<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function __construct() {
        // $this->middleware('CheckAge')->except('index');
        // $this->middleware('CheckRole')->only('dashboard');
    }
    public function index()
    {
       return view('admin');
    }
    public function show()
    {
        return view('admin');
    }
    public function dashboard()
    {
        $users = Auth::user();
        return $users->role->id;
        // return $users;
    }
}
