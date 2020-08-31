@extends('layouts.shop')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Giỏ hàng</h1>
            <form action="{{route('cart.update')}}" method="get">
                {{-- Csrf là hình thức bảo mật của laravel cung cấp cho form --}}
                @csrf
            @if (Cart::count()>0)
            <table class="table">
                <thead>
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
                <tbody>
                    @php
                        $i =0;
                    @endphp
                    @foreach (Cart::content() as $row)
                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td scope="row">{{$i}}</td>
                        <td>
                            <img src=" {{asset($row->options->thumbnail)}}" width="100px" alt="">
                        </td>
                        <td scope="col"><a href="">{{$row->name}}</a></td>
                        {{-- <td scope="col" id="price">{{number_format($row->price,0,'','.')}}</td> --}}
                        {{-- <td scope="col"  data-th="Price" id="price">{{$row->price}}</td>
                        <td scope="col" data-th="Quantity"> --}}
                            {{-- <input type="number" min="1" max="5" id="num_order" name="qty[{{$row->rowId}}]" value="{{$row->qty}}"> --}}
                            {{-- <input type="number" value="{{$row->qty}}" class="form-control quantity" /> --}}
                        {{-- </td> --}}
                        {{-- <td scope="col" id="total">{{number_format($row->total,0,'','.')}}đ</td> --}}
                        {{-- <td scope="col" id="total" data-th="Subtotal">{{$row->total()}}</td>
                        <td>
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $row->rowId }}"><i class="fa fa-refresh"></i></button>
                            <a href="{{route('cart.remove',$row->rowId)}}" class="text-danger">Xóa</a> --}}
                            {{-- <td data-th="Price">{{$row->price}}</td> --}}
                            <td data-th="Price" class="price">{{$row->price}}</td>
                            <td data-th="quantity">
                                <input type="number" min="1" max="5" value="{{$row->qty}}" class="form-control quantity" name="qty[{{$row->rowId}}]"/>
                            </td>
                            <td data-th="Subtotal" class="text-center total">{{number_format($row->total,0,'','.')}}đ</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm update-cart" data-id="{{ $row->rowId }}"><i class="fa fa-refresh"></i></button>
                                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $row->rowId }}"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><button type="submit" class="btn btn-primary" name="btn_update">Cập nhật giỏ hàng </button></td>

                        <td><button class="btn btn-danger"><a href="{{route('cart.destroy')}}" class="text-decoration-none text-white">Xóa tất cả</a></button> </td>
                        <td colspan='6' class="text-right">Tổng:</td>
                        <td><strong class="subtotal">{{Cart::subtotal()}}đ</strong></td>
                    </tr>
                </tfoot>
            </table>
            @else
            <h5>Chưa có sản phẩm nào trong giỏ hàng, mời bạn quay lại cửa hàng để mua <button class="btn btn-success"><a class="text-decoration-none text-white" href="{{url('/')}}">Nhấn vào đây để quay lại</a></button></h5>
            @endif
        </form>
        </div>
    </div>
</div>
@endsection

@section('ajax')

    <script type="text/javascript">

        $(".update-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                var data = {
                            _token: '{{ csrf_token() }}',
                            rowid: ele.attr("data-id"),
                            quantity: ele.parents("tr").find(".quantity").val(),
                            price: ele.parents("tr").find(".price").text(),
                        };
                console.log(data);
                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: "patch",
                    data: data,
                    success: function (response) {
                        ele.parents("tr").find(".total").text(response);
                        window.location.reload();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
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
        // $(document).ready(function () {
        //     $("#num_order").change(function () {
        //         let rowId = $("#rowId").val();
        //         let qty = $("#num_order").val();
        //         let price = $("#price").text();
        //         let data = {rowId: rowId, qty: qty,price: price };
        //         let url = "{{ route('cart.update') }}";
        //         $.ajax({
        //             url: url,
        //             // method: 'GET',
        //             data: data,
        //             dataType: 'text',
        //             success: function (response) {
        //                 $('#total').text(response);
        //                 window.location.reload();
        //             },
        //             error: function (response) {
        //                 console.log('Error:', response);
        //             }
        //         });
        //     })
        // });
    </script>

@endsection

