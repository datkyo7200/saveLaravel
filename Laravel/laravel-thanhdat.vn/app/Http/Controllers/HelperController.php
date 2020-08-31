<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    //
    public function url()
    {
        // $url = url('login');
        // $url = route('post.show');
        // $url = action('PostController@add');
        $url = url()->current();
        return $url;
    }
    public function string()
    {
        // $str_1 = "Phan Thành Đạt";
        // echo Str::length($str_1);
        // echo Str::lower($str_1);
        // echo Str::upper($str_1);
        // echo Str::random(2);
        // $str_1 = Str::of(' nguyen van a  ss   ')->trim();
        // $str_1 = "Laravel Pro";
        // echo Str::of($str_1)->substr(9);
        // echo Str::of($str_1)->substr(0,7);
        // $str_1 = Str::slug('Thanhdat.vn Học web đi làm');
        // echo $str_1;
        // echo Str::of('Phan thành ')->append('đạt');
        // $str_1 = "Laravel Pro 7x";
        // echo Str::of($str_1)->replace('7x','6x');
        // $str_1 = "Ông Nguyễn Thành Phong nêu lý do người Trung Quốc nhập cảnh trái phép vào TP.HCM";
        // echo Str::of($str_1)->limit(50);
        $str_1 = "thanhdat.vn học lập trình web đi làm";
        echo Str::contains($str_1, 'đi làm');
    }
}
