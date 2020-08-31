@extends('layouts.shop')
@section('content')
<!-- end header -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Giỏ hàng</h1>
                <p>Hiện tại có {{Cart::count()}} sản phẩm trong giỏ hàng</p>
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
                                $t=0;
                            @endphp
                            @foreach (Cart::content() as $row)
                            @php
                                $t++;
                            @endphp
                            <tr>
                            <td scope="row">{{$t}}</td>
                                <td>
                                    <img src="{{asset($row->options->thumbnail)}}" width="100px" alt="">
                                </td>
                            <td scope="col"><a href="">{{$row->name}}</a></td>
                                <td scope="col">{{number_format($row->price,0,'','.')}}đ</td>
                                <td scope="col">
                                    <input type="number" min="1" name="qty[{{$row->rowId}}]" style="width:50px; text-align: center" value="{{$row->qty}}">
                                </td>
                                <td scope="col">{{number_format($row->total,0,'','.')}}đ</td>
                            <td><a href="{{route('cart.remove',$row->rowId)}}" class="text-danger">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><button type="submit" class="btn btn-primary" name="btn_update">Cập nhật giỏ hàng </button></td>
                                <td><button class="btn btn-danger"><a class="text-white" href="{{route('cart.destroy')}}" value="">Xóa giỏ hàng</a></button></td>
                                <td colspan='6' class="text-right">Tổng:</td>
                                <td><strong>{{Cart::subtotal()}}đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
