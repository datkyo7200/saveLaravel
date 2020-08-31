<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function show()
    {
        return view('cart.show');
    }
    public function add(Request  $request,$id)
    {
        // Cart::destroy();
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
        // echo "<pre>";
        // $carts = Cart::content();
        // print_r($carts);
        // echo "</pre>";
        return redirect('cart/show');
        // return "Thêm sản phẩm {$id} thành công vào giỏ hàng";
    }
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('cart/show');
    }
    public function destroy()
    {
        Cart::destroy();
        return redirect('cart/show');
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $data = $request->get('qty');
        foreach ($data as $k=>$v) {
            Cart::update($k,$v);
        };
        return redirect('cart/show');
    //   return $request->all();
    }
}
