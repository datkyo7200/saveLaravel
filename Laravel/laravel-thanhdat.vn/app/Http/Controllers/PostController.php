<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function add()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {
        $request ->validate(
            [
                'title'=>'required',
                'content'=>'required',
            ],
            [
                'required'=>' :attribute không được để trống',
            ],
            [
                'title'=>' Tiêu đề',
                'content'=>' Nội dung'
            ]
        );
        $input =$request->all();

        // return $request ->input();
        if($request->hasFile('file')){

            $file = $request->file;
            //lấy tên file
            $filename = $file->getClientOriginalName();
            //Lấy đuôi file
            echo $file->getClientOriginalExtension();
            //Lấy kích thước file
            echo $file->getsize();
            //Chuyển file lên server
            $file->move('public/uploads',$file->getClientOriginalName());

            // Lưu file vào database
            $thumbnail = 'public/uploads/'.$filename;
            $input['thumbnail'] = $thumbnail;
        }
        $input['user_id'] = 2;
        Post::create($input);
        return redirect('post/show')->with('status','Thêm bài viết thành công');

        // return redirect()->route('post.show');
    }

    public function show()
    {
        // return redirect()->away('https://facebook.com');
    //    $posts = Post::all();
        #QUERY BUILDER
        // $posts = DB::table('posts')->where('id','>',3)->orderBy('id','desc')->SimplePaginate(4);
        #ORM
        $posts = Post::paginate(3);
        $posts->withPath('demo/show');
       return view('post.index',compact('posts'));
    }
}
