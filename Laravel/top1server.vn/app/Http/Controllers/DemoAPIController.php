<?php

namespace App\Http\Controllers;

use App\SinhVien;
use Illuminate\Http\Request;

class DemoAPIController extends Controller
{
    //
    public function index()
    {   
        return view('demoAPI.demo');
    }
    public function store(Request $request)
    {
        // echo "Tên bạn là: ".$request->input('name');
        // dd($request->all());
        SinhVien::create([
            'name' => $request->input('name'),
            'mssv' => $request->input('mssv'),
            'age' => $request->input('age'),
        ]);
        $sinhviens = SinhVien::all();
        return response()->json($sinhviens,200);
    }
}
