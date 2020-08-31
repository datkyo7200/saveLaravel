<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>

<body>
    <div id="wraper">
        <div id="header" class="bg-dark mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4  text-white text-bold py-2">
                    <a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" height="26px" alt=""></a>
                    </div>
                    <div class="col-md-4">
                        <nav class="navbar navbar-light bg-light">
                        <form action="{{route('product.search')}}" class="form-inline" method="GET">
                          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                      </nav>
                    </div>
                    <div class="col-md-4">
                    <a href="{{url('cart/show')}}" class="py-2 d-block float-right text-danger">Giỏ hàng: <span class="text-success">{{Cart::count()}}</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div id="wp-content">
            @yield('content')
        </div>
        <!-- end wp-content -->
        <div id="footer" class="bg-secondary text-center text-warning mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        UNITOP.VN - HỌC ĐỂ DẪN ĐẦU
                    </div>
                </div>
            </div>

        </div>
    </div>
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
