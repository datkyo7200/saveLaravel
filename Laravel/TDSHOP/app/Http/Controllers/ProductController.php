<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function detail($id)
    {
        return view('pages.product.detail',compact('id'));
    }
    public function search(Request $request)
    {
        $keywords = $request->get('keywords');
        // $searchs = Product::where('name','LIKE', $request->get('keywords') . '%')->get();
        $searchs = Product::where('name','LIKE', "%{$keywords}%")->Paginate(6);
        $cfr = count($searchs);
        return view('pages.product.search',compact('searchs','keywords','cfr'));
    }
}
