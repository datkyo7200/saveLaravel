@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh sửa sản phẩm
        </div>
        <div class="card-body">
            <form action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$product->name}}">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input class="form-control" type="text" name="price" id="price" value="{{$product->price}}">
                            @error('price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="description" name="description" cols="30" rows="5"> {{$product->desc}}</textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror                               
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">Chi tiết sản phẩm</label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="5">{{$product->content}}</textarea>
                    @error('content')
                        <small class="text-danger">{{$message}}</small>
                    @enderror                       
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <select class="form-control" id="category" name="category">
                                <option>Chọn danh mục</option>
                                <option>Danh mục 1</option>
                                <option>Danh mục 2</option>
                                <option>Danh mục 3</option>
                                <option>Danh mục 4</option>
                            </select>
                            @error('category')
                                <small class="text-danger">{{$message}}</small>
                            @enderror   
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand">Nhãn hiệu</label>
                            <select class="form-control" id="brand" name="brand">
                                <option>Chọn danh mục</option>
                                <option>Danh mục 1</option>
                                <option>Danh mục 2</option>
                                <option>Danh mục 3</option>
                                <option>Danh mục 4</option>
                            </select>
                            @error('brand')
                                <small class="text-danger">{{$message}}</small>
                            @enderror   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Chờ duyệt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Công khai
                                </label>
                            </div>
                            @error('status')
                                <small class="text-danger">{{$message}}</small>
                            @enderror   
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="file-image">Hình ảnh</label>
                            <div>
                                <img src="{{asset($product->image)}}"  
                                style="width:90px;height:110px;margin-bottom:15px"
                                alt="">
                            </div>
                            <input type="file" name="file" id="file-image"/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" >CẬP NHẬT</button>
            </form>
        </div>
    </div>
</div>
@endsection
<style>
    #file-image{
        background-image: url('./public/backend/image/add-image.png'); //đây là icon cần thêm
        background-repeat: no-repeat; //không lặp
        background:#fff;
        background-position: 280px; //điều chỉnh vị trí của image, dịch trái, phải. hoặc lên, xuống.
    }
</style>