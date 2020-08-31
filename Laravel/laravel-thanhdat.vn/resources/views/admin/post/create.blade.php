@extends('admin.post.show')
@section('title','Trang admin create')
@section('content')
    <p>NỘI DUNG TRANG Thêm bài viết/p>
    <form action="post/add" method="POST">
        <input class="form-control" type="text" name="title" placeholder="Tiêu đề">
        <br>
        <textarea name="content" id="" placeholder="Nội dung" cols="30" rows="10"></textarea>
        <input type="submit" value="" name="sm-add">
    </form>
@endsection
