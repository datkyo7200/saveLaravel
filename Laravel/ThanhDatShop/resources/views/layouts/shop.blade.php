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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>

<body>
    <div id="wraper">
        <div id="header" class="bg-danger mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-white text-bold py-2">
                        <a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" height="26px" alt=""></a>
                    </div>
                    <div class="col-md-4">
                        @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="py-2 d-block float-right text-danger">
                            <a href="{{url('cart/show')}}"><i class="fa fa-shopping-cart" style="font-size:30px;color:white" aria-hidden="true"></i><span class="text-white text-decoration-none">{{Cart::count()}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div id="wp-content"
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
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    @yield('ajax')
</body>
</html>
