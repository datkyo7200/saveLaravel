@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm mới sản phẩm
        </div>
        <div class="card-body">
            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name" id="name">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input class="form-control" type="text" name="price" id="price">
                            @error('price')
                                <small class="text-danger">{{$message}}</small>
                            @enderror                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="description" name="description" cols="30" rows="5"></textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror                               
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">Chi tiết sản phẩm</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="5"></textarea>
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
                            <label for="file">Hình ảnh</label>
                            <input type="file" name="file" id="file"/>
                            @error('file')
                                <small class="text-danger">{{$message}}</small>
                            @enderror   
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">THÊM MỚI</button>
            </form>
        </div>
    </div>
</div>
@endsection
