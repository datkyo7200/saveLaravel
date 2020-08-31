<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    //
    public function show(){
        return view('pages.introduce.show');
    }
}
