@extends('layouts.app')

@section('title','Tiêu đề trang con')
@include('inc.comment',['title'=>'Comment bài viết'])
@section('content')
    <p>Nội dung trang con</p>
    <p>Họ và tên: {!!$data!!}</p>
    @if ($data % 2==0)
       <h1>{{$data}}: là số chẵn</h1>
    @else
        <h1>{{$data}}: là số lẻ</h1>
    @endif
    @for ($i =1; $i <= $n; $i++)
        <p> Giá trị của i hiện tại là: {{ $i }}</p>
    @endfor
    @foreach ($users as $key => $user)
        <p>{{$key}}=>{{$user['name']}}</p>
    @endforeach
    @foreach ($sinhvien as $key => $value)
        <p>{{$key}}=>{{$value}}</p>
    @endforeach
    @php
        foreach ($users as $key => $user){
            echo $user['name']. '<br/>';
        }
    @endphp
    @isset($record)
        <p>Tiêu đề là: {{$record}}</p>
    @endisset
    @empty($records)
         <p>Không có user nào</p>
    @endempty
@endsection

@section('slidebar')
    @parent
    <p>Đây là slider trang con</p>
@endsection
