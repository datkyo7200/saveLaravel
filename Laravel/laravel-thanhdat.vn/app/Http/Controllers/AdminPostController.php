<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    //

    public function index(){
        return view('admin.post.show');
    }
    public function show($id){
        return view('admin.post.show',compact('id'));
    }
    function add(){
        return view('admin.post.add');
    }
    public function update($id){
        return view('admin.post.update',compact('id'));
    }
    public function delete($id){
        return view('admin.post.delete',compact('id'));
    }
}
