<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    //
    function show()
    {
        $products= Product::all();
        return view('product.show',compact('products'));
    }
}
