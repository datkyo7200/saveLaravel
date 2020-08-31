<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Product::Paginate(6);
        return view('pages.home',compact('products'));
    }
}
