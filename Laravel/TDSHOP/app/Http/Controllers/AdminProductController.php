<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProductController extends Controller
{
    //
    public function __construct() {
        $this->middleware(function ($request,$next)
        {
            session(['module_active' => 'product']);

            return $next($request);

        });
    }
    public function list()
    {

        $products = Product::Paginate(5);
        $count_status_enable= Product::where('status','=','0')->count();
        $count_status_disnable= Product::where('status','=','1')->count();
        $count_status = [$count_status_enable,$count_status_disnable];
        return view('admin.product.list',compact('products', 'count_status'));
    }
    public function add()
    {
        return view('admin.product.add');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'category' =>'required',
                'brand' =>'required',
                'status' =>'required',
                'file' =>'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'name' => 'Tên sản phẩm',
                'price' => 'Giá sản phẩm',
                'category' => 'Danh mục sản phẩm',
                'brand' => 'Nhãn hiệu sản phẩm',
                'status' => 'Tình trạng sản phẩm',
                'file' => 'Hình ảnh sản phẩm',

            ]
        );
        if($request->hasFile('file')){
            $file = $request->file;
            //lấy tên file
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads', $file->getClientOriginalName());
            $thumbnail = 'uploads/'.$filename;
        };
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'desc' => $request->input('description'),
            'content' => $request->input('content'),
            'status' => 1,
            'image' => $thumbnail,
            'category_id' => 1,
            'brand_id' => 1,
        ]);
        return redirect('admin/product/list')->with('status', 'Đã thêm sản phẩm thành công');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }
    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'category' => 'required',
                'brand' => 'required',
                'status' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'name' => 'Tên sản phẩm',
                'price' => 'Giá sản phẩm',
                'category' => 'Danh mục sản phẩm',
                'brand' => 'Nhãn hiệu sản phẩm',
                'status' => 'Tình trạng sản phẩm',
            ]
        );
        if ($request->hasFile('file')) {
            $file = $request->file;
            //lấy tên file
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads', $file->getClientOriginalName());
            $thumbnail = 'uploads/' . $filename;
        }
        else{
            $thumbnail = Product::find($id)->image;
        };
        Product::where('id', $id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'desc' => $request->input('description'),
                'content' => $request->input('content'),
                'image'=> $thumbnail,
                'status' => 1,
                'category_id' => 1,
                'brand_id' => 1,
                ]);
        return redirect('admin/product/list')->with('status', 'Đã cập nhật sản phẩm thành công');
    }
    public function category()
    {
        $categorys = CategoryProduct::Paginate(5);
        return view('admin.product.category',compact('categorys'));
    }
}
