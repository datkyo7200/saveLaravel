<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    function show()
    {
        $products = Product::all();
        // return $products;
        return view('product.show',compact('products'));
    //    $posts= DB::table('products')->select('*')->get();
    //    print_r($posts);
    }
    public function detail($id)
    {
        $details = Product::all()->where('id','=',$id);
        return view('product.detail',compact('details'));
    }
    public function search(Request $request)
    {
        $keys = $request->get('search');
        $searchs = Product::where('name','LIKE', $request->get('search') . '%')->get();
        $cfr = count($searchs);
        return view('product.search',compact('searchs','keys','cfr'));
    }
    function add($id)
    {
        # QUERY BUILDER
        // DB::table('products')->insert(
        //     ['name'=>'Samsung A70','price'=>100000,'product_cat_id'=>1,'user_id'=>1]
        //     );
        // echo "Thêm dữ liệu thành công";
        // return view('product.create');

        #ELOQUENT ORM DATABASE
        // $products = new Product;
        // $products->name ="Iphone 8";
        // $products->price = 900000;
        // $products->product_cat_id =1;
        // $products->user_id =2;
        // $products->save();
        Product::create([
            'name'=> 'Samsung Note 7',
            'price'=> 170000,
            'product_cat_id'=> 2,
            'user_id'=> 3,
        ]);
        echo "Thêm dữ liệu thành công";

    }
    function update($id)
    {
        # QUERY BUILDER
        // DB::table('products')
        // ->where('id',$id)
        // ->update(['name'=>'Máy tính bảng',
        // 'price'=> 300000]);

        #ELOQUENT ORM DATABASE
        // $products = Product::find($id);
        // $products->name ="Bphone 9";

        // $products->save();
        Product::where('id',$id)
        ->update(
            [
            'name'=> 'OPPO RENO 4',
            'price'=> 840000,
            'product_cat_id'=> 2,
            'user_id'=> 3,]
        );

        echo "Update dữ liệu thành công";
    }
    function delete($id)
    {
        // return DB::table('products')
        // ->where('id',$id)
        // ->delete();
        // Product::find($id)
        // ->delete();
        // Product::where('id',$id)
        // ->delete();
        // Product::destroy($id);
        // Product::destroy([16,17]);

        echo "Đã xóa thành công";
    }
    function read()
    {
        // $products = Product::where('name','LIKE','%samsung%')->get();
        // $products = Product::where('user_id',3)->first();
        // $products = Product::orderBy('user_id','desc')->get();
        // $products = Product::selectRaw("COUNT('id') as number_products, user_id  ")
        // ->groupBy('user_id')
        // ->get();
        // $products = Product::offset(4)
        // ->limit(2)
        // ->get();
        // $products = Product::withoutTrashed()
        // ->get();
        // $products = Product::onlyTrashed()
        // ->get();
        // $img = Product::find(2)
        // ->FeaturedImage;
        // $user = Product::find(5)
        // ->user;
        $products = User::find(3)
        ->Products;
        // print_r($products);
        echo "<pre>";
        print_r($products);
        echo "</pre>";
        echo "Đã xuất thành công";
    }
    function restore($id){
        Product::onlyTrashed()
        ->where('id',$id)
        ->restore();
        echo "Đã xóa thành công";
    }
    function permanentlyDelete($id){
        $products = Product::find($id)->forceDelete();
        return $products;
    }
}
