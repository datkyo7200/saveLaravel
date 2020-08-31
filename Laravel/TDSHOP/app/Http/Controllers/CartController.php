<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function show(){
        return view('pages.cart.show');
    }
    public function add(Request $request)
    {
        $id = $request->input('id');
        $products = Product::find($id);
        Cart::add(
            [
                'id' => $products->id,
                'name' => $products->name,
                'qty' => 1,
                'price' => $products->price,
                'options' =>
                [
                    'thumbnail' => $products->thumbnail,
                ]
            ]);
        // return redirect('cart/show');
    }
    public function update(Request $request)
    {
        $data = $request->get('qty');
        foreach ($data as $k=>$v) {
            Cart::update($k,$v);
         };
        return redirect('cart/show');
    }
    public function remove(Request $request)
    {
        // if($request->rowid) {
        $rowId = $request->rowid;
        // echo $rowId;
        Cart::remove($rowId);
        // }
    }
    public function destroy(Request $request)
    {
        if($request->ajax()){
            Cart::destroy();
        }
    }
}
