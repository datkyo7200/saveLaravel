@extends('layouts.shop')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">DANH MỤC</div>
        <div class="col-8">
            <div id="carouselId" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="public\images\slideIP3.jpg" width="100%" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="public\images\slideIP2.jpg"  width="100%" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="public\images\slideIP1.jpg"  width="100%" alt="">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1>Shop</h1>
            <div class="list-product mt-3">
                <div class="row">
                    @foreach ($products as $product)

                    <div class="col-md-3 col-sm-4 col-6 mb-3">
                        <div class="product-item border py-2">
                            <div class="product-thumb">
                                <a href="">
                                <img class="img-fluid" src="public/{{$product->thumbnail}}" alt="">
                                </a>
                            </div>
                            <div class="product-info p-2 text-center">
                            <a class="product-title" href="">{{$product->name}}</a>
                                <div class="price-box">
                                    <span class="current-price text-danger">{{number_format($product->price,0,'','.')}}vnđ</span>
                                </div>
                                <a href="{{route('product.detail',$product->id)}}" class="btn btn-primary btn-sm mt-3" class="add-to-cart">Xem chi tiết</a>
                                <a href="{{route('cart.add',$product->id)}}" class="btn btn-outline-danger btn-sm mt-3" class="add-to-cart">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

