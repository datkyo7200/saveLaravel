@extends('layouts.page')
@section('content')
<div id="wp-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Giỏ Hàng</h2>
                    <div class="row">
                        <form action="{{route('cart.update')}}" method="GET">
                        {{-- Csrf là hình thức bảo mật của laravel cung cấp cho form --}}
                        @csrf
                        @if (Cart::count()>0)
                        <table class="table text-center" style="margin-left: 20px;margin-right: 10px">
                            <thead class="text-white" style="background-color: #DAA520">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Tác vụ</th>
                              </tr>
                            </thead>
                            @php
                            $i =0;
                            @endphp
                            @foreach (Cart::content() as $row)
                            @php
                                $i++;
                            @endphp
                            <tbody class="text-secondary">
                              <tr>
                                <td scope="col">{{$i}}</td>
                                <td>
                                    <img src="https://techland.com.vn/wp-content/uploads/2019/09/dien-thoai-iphone-11-pro-max-2.jpg" width="100px" alt="">
                                </td>
                                <td scope="col"><a href="">{{$row->name}}</a></td>
                                <td>{{number_format($row->price,0,'','.')}}đ</td>
                                <td style="width:80px">
                                    <input type="number" min="1" max="5" value="{{$row->qty}}" class="form-control" name="qty[{{$row->rowId}}]"/>
                                </td>
                                <td class="text-center total">{{number_format($row->total,0,'','.')}}đ</td>
                                <td>
                                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $row->rowId }}"><i class="fa fa-trash-o"></i></button>
                                </td>
                                {{-- {{route('cart.destroy')}} --}}
                              </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-primary" id="cart_to_update" name="btn_update" data-id="{{ $row->rowId }}">Cập nhật</button>
                                        <button class="btn btn-danger" id="cart_to_delete">Xóa tất cả</button>
                                    </td>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-primary"><a class="text-decoration-none text-white" href="{{route('customer.login')}}">Thanh Toán</a></button>
                                    </td>
                                    <td colspan="2">
                                        <label style="font-size: 16px;
                                        font-weight: bold;
                                        color: #333;">Tổng tiền:</label>
                                        <span style="font-size: 16px;
                                        font-weight: bold;
                                        color: #d0021b;" data-tongtien="12490000">{{Cart::subtotal()}}<sup>đ</sup></span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                        @else
                        <div class="text-center" style="margin:50px">
                            <img src="https://fptshop.com.vn/gio-hang-v2/cart/Desktop/images/null.png" alt="" style="padding-bottom: 30px">
                            <h5>Chưa có sản phẩm nào trong giỏ hàng, mời bạn quay lại cửa hàng để mua</h5>
                            <button type="button" class="btn btn-primary">
                                <a class="text-decoration-none text-white" href="{{url('/')}}">Nhấn vào đây để quay lại</a>
                            </button
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wp-content -->
@endsection
@section('ajax_cart')
<script type="text/javascript">
    $(document).ready(function () {
        $('#cart_to_delete').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '{{route('cart.destroy')}}',
                    success:function(responsi){
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        ).then((result)=>{
                            window.location.reload();
                        });
                    }
                });
                }
            });
        });
    });
    $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);
            var data = {_token: '{{ csrf_token() }}', rowid: ele.attr("data-id")};
            // console.log(data);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: data,
                    success: function (response) {
                        // alert(response);
                        window.location.reload();
                    }
                });
            }
        });
</script>
@endsection
