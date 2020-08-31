@extends('layouts.page')
        <div id="wp-content">
            @section('slider')
                <div class="row">
                    <div class="col-8">
                        <div class="slide-header">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                       <img src="https://didongviet.vn/pub/media/magestore/bannerslider/images/6/7/670x393_58.jpg" width="100%"  height="380px" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://didongviet.vn/pub/media/magestore/bannerslider/images/6/7/670x393-galaxy-note-20-didongviet.jpg" width="100%"  height="380px" alt="">
                                    </div>
                                    <div class="carousel-item">
                                       <img src="https://didongviet.vn/pub/media/magestore/bannerslider/images/6/7/670x393_57.jpg" width="100%" height="380px" alt="">
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
                            <div class="slide-bottom">
                                <div class="row">
                                    <div class="col-3"><a href=""><p>Galaxy S20 Plus|S20 Ultra<br>Giảm đến 11 triệu</p></a></div>
                                    <div class="col-3 verticalLine"><a href=""><p>Trade-in Note20 | 20 Ultra<br>Miễn phí hoặc bù 3,9 triệu</p></a></div>
                                    <div class="col-3 verticalLine"><a href=""><p>Sắm Vsmart Active 3&nbsp;<br>Giảm đến 900 ngàn</p></a></div>
                                    <div class="col-3 verticalLine"><a href=""><p>Hotsale Oppo A92<br>Giảm đến 1,2 triệu</p></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="img-slide">
                        <img src="{{asset('frontend/img/1l.jpg')}}" width="100%" height="138px" alt=""  style="margin-bottom: 10px">
                        <img src="{{asset('frontend/img/2l.jpg')}}" width="100%" height="138px" alt=""  style="margin-bottom: 10px">
                        <img src="{{asset('frontend/img/3l.jpg')}}" width="100%" height="138px" alt="">
                        </div>
                    </div>
                </div>
            @endsection
            @section('content')
                <div class="row">
                    <div class="col-12 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Sản phẩm mới nhất</h2>
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="{{route('product.detail',$product->id)}}">
                                                        <img src="{{asset($product->image)}}" width="80%" alt="" />
                                                        <h2>{{number_format($product->price,0,".",".")}}đ</h2>
                                                        <p>{{$product->name}}</p>
                                                     </a>
                                                    <form>
                                                        @csrf
                                                        <input type="hidden" value="{{$product->id}}" class="id">
                                                    </form>
                                                    <a href="" class="btn btn-default add-to-cart" data-id_product="{{$product->id}}">Thêm giỏ hàng</a>
                                                </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <ul class="pagination m-t-none m-b-none">
                                {{ $products->links()}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endsection
        </div>
        <!-- end wp-content -->
        @section('ajax_cart')
            <script>
                $(document).ready(function () {
                    $('.add-to-cart').click(function(e){
                        e.preventDefault();
                        var id = $(this).data('id_product');
                        var url = '{{route('cart.add')}}';
                        // alert(id);
                        $.ajax({
                            url: url,
                            data:{id: id},
                            success:function(){

                                swal.fire({
                                        title: "Đã thêm sản phẩm vào giỏ hàng",
                                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                        type: 'success',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: "Đi đến giỏ hàng",
                                        cancelButtonText: "Xem tiếp",
                                        closeOnConfirm: false
                                    }).then(function(result) {
                                        if (result.value) {
                                            location.assign("{{url('cart')}}")
                                        }
                                    });
                            }

                        });
                    })
                });
            </script>
        @endsection
