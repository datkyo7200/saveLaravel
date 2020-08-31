<?php

namespace App\Http\Controllers;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

class DemoMailController extends Controller
{
    //
    public function sendMail()
    {
        $data =[
            'key1' =>'Dữ liệu được truyền vào từ DemoMailController',
            'key2' => 'value 2',
        ];
        Mail::to('ptd58131284@gmail.com')->send(new DemoMail($data));
    }
}
