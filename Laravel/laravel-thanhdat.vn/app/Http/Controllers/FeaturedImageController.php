<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\FeaturedImage;

class FeaturedImageController extends Controller
{
    //
    function read()
    {
        $img = FeaturedImage::find(1)
        ->Product;
        // print_r($products);
        return $img;
    }
}
