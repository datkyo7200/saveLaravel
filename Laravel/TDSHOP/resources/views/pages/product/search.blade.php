@extends('layouts.page')
@section('content')
<div id="wp-content">
    <div class="container">
        <div class="row">
            <div class="col-12 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">{{$cfr}} Sản phẩm được tìm kiếm</h2>
                    <h5>Tìm kiếm sản phẩm với từ khóa: {{$keywords}}</h5>
                    @if ($cfr>0)
                    <div class="row">
                        @foreach ($searchs as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{route('product.detail',$product->id)}}">
                                                <img src="https://techland.com.vn/wp-content/uploads/2019/09/dien-thoai-iphone-11-pro-max-2.jpg" width="80%" alt="" />
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
                    @endif
                    <ul class="pagination m-t-none m-b-none">
                        {{ $searchs->links()}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
