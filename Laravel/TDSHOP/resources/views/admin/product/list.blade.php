@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="#" class="text-primary">Kích hoạt <span class="text-muted">{{$count_status[0]}}</span></a>
                <a href="#" class="text-primary">Vô hiệu hóa <span class="text-muted">{{$count_status[1]}}</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                        $url= 'http://localhost/Laravel/TDSHOP/';
                    @endphp
                    @foreach ($products as $product)
                    @php
                        $i++;
                    @endphp
                    <tr class="">
                        <td scope="col">
                            <input type="checkbox">
                        </td>
                        <td>{{$i}}</td>
                        <td>
                            <img src="{{asset($product->image)}}"  
                            style="width:70px;height:90px"
                            alt="">                           
                        </td>
                        <td scope="col"><a href="#">{{$product->name}}</a></td>
                        <td scope="col">{{number_format($product->price,0,'','.')}}đ</td>
                        <td scope="col">{{$product->category->category_name}}</td>
                        <td scope="col">26:06:2020 14:00</td>
                        @if ($product->status==0)
                        <td scope="col"><span class="badge badge-success">Còn hàng</span></td>
                        @else
                        <td scope="col"><span class="badge badge-dark">Hết hàng</span></td>
                        @endif
                        <td scope="col">
                            <a href="{{url('admin/product/edit',$product->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            {{ $products->links()}}
        </div>
    </div>
</div>
@endsection
