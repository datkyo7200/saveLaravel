<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    //
    public function set()
    {
        $responsi = new Response();
         return $responsi->cookie('thanhdat', 'hoc web di lam',24*60);
    }
    public function get(Request $request)
    {
        return $request->cookie('thanhdat');
    }
}
