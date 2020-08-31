@extends('layouts.shop')
@section('content')
<div class="container">
    @foreach ($details as $detail)
    <h1>Điện thoại {{$detail->name}}</h1>
    <div class="row">
        <div class="col-7">
            {{$detail->content}}
        </div>
        <div class="col-4">
            <img src="{{asset($detail->thumbnail)}}" width="100%" alt="">
            <button type="submit" class="btn btn-danger"><a  href="{{route('cart.add',$detail->id)}}" class="text-white text-decoration-none">Thêm vào giỏ hàng</a></button>
        </div>
    </div>
    @endforeach

</div>
@endsection
