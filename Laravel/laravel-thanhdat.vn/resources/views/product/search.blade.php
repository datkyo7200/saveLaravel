@extends('layouts.shop')
@section('content')
<div class="container">
    <h5>Tìm kiếm sản phẩm với từ khóa: {{$keys}}</h5>
    <h6>Có {{$cfr}} sản phẩm được tìm kiếm</h6>
    @if ($cfr>0)
    <div class="row">
        <div class="col-12">
            <h1>Shop</h1>
            <div class="list-product mt-3">
                <div class="row">

                    @foreach ($searchs as $search)
                    <div class="col-md-3 col-sm-4 col-6 mb-3">
                        <div class="product-item border py-2">
                            <div class="product-thumb">
                                <a href="">
                                <img class="img-fluid" src="{{asset($search->thumbnail)}}" alt="">
                                </a>
                            </div>
                            <div class="product-info p-2 text-center">
                            <a class="product-title" href="">{{$search->name}}</a>
                                <div class="price-box">
                                    <span class="current-price text-danger">{{number_format($search->price,0,'','.')}}đ</span>
                                </div>
                                <a href="{{route('product.detail',$search->id)}}" class="btn btn-primary btn-sm mt-3" class="add-to-cart">Xem chi tiết</a>
                                <a href="{{route('cart.add',$search->id)}}" class="btn btn-outline-danger btn-sm mt-3" class="add-to-cart">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    @endif


</div>
@endsection
