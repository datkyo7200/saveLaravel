@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh sửa người dùng
        </div>
        <div class="card-body">
            <form action="{{route('user.update',$admin->id)}}"  method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$admin->name}}" autocomplete="name" autofocus>
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{$admin->email}}" disabled autocomplete="email">
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_old">Nhập mật khẩu cũ</label>
                    <input class="form-control" type="password" name="password_old" id="password_old" autocomplete="password_old" value="{{$admin->password}}">
                    @error('password_old')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_new">Nhập mật khẩu mới</label>
                    <input class="form-control" type="password" name="password_new" id="password_new" autocomplete="new-password">
                    @error('password_new')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_comfirmation">Xác nhận mật khẩu mới</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_comfirmation" autocomplete="new-password">
                    @error('password_confirmation')
                        <small class="text-danger">{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="">Nhóm quyền</label>
                    <select class="form-control" id="">
                        <option>Chọn quyền</option>
                        <option>Danh mục 1</option>
                        <option>Danh mục 2</option>
                        <option>Danh mục 3</option>
                        <option>Danh mục 4</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="btn_update">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
