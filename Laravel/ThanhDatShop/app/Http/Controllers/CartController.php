<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function show()
    {
        return view('cart.show');
    }
    public function add(Request $request,$id)
    {
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
        return redirect('cart/show');

    }
    // public function remove($rowId)
    // {
    //     Cart::remove($rowId);
    //     return redirect('cart/show');
    // }
    public function remove(Request $request)
    {
        // if($request->rowid) {
        $rowId = $request->rowid;
        // echo $rowId;
        Cart::remove($rowId);
        // }
    }
    public function destroy()
    {
        Cart::destroy();
        return redirect('cart/show');
    }
    public function update(Request $request)
    {
        if($request->ajax()){
            $rowId = $request->rowid;
            $quantity = $request->quantity;
            $price = $request->price;
            $total = $quantity * $price;
            echo number_format($total,0,'','.').'đ' ;
            Cart::update($rowId,$quantity); // Will update the quantity
        }
        else{
            $data = $request->get('qty');
            foreach ($data as $k=>$v) {
                Cart::update($k,$v);
            };
            return redirect('cart/show');
        }
    }

}
