<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>TDSHOP</title>
      <!-- CSS only -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
   </head>
   <body>
      <header id="header">
         <!--header-->
         <div class="header_top">
            <!--header_top-->
            <div class="container">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 0929363719</a></li>
                            <li><a href="{{url('/')}}"><i class="fa fa-envelope"></i> tdshop.vn</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="social-icons pull-right">
                        <ul class="nav navbar-nav" style="display: inline-block">
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                           <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/header_top-->
         <div class="header-middle">
            <!--header-middle-->
            <div class="container">
               <div class="row">
                  <div class="col-sm-3">
                     <div class="logo pull-left">
                     <a href="{{url('/')}}"><img src="{{asset('frontend/img/your-logo.png')}}" width="100%" alt="" /></a>
                     </div>
                  </div>
                  <div class="col-sm-9">
                     <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav"  style="display:inline-block">
                           <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                           <li><a href=""><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                           <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                           <li><a href=""><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
                           <li><a href="{{route('customer.login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/header-middle-->
         @php
             $nameCates = [
                 1 => 'Điện thoại',
                 2 => 'Máy tính bảng',
                 3 => 'Laptop',
                 4 => 'Máy chụp ảnh',
             ];
         @endphp
         <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
               <div class="row">
                  <div class="col-sm-7">
                      <nav class="menu">
                        <ul class="root">
                            <li><a href="{{url('/')}}" class="active">Trang chủ</a></li>
                            <li><a href="#">Sản phẩm <i class="fa fa-angle-down"></i></a>
                                <ul class="submenu">
                                    @foreach ($nameCates as $item)
                                    <li><a href="{{url('/',$item)}}">{{$item}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{url('news')}}">Tin tức</a></li>
                            <li><a href="{{url('introduce')}}">Giới thiệu</a></li>
                            <li><a href="#">Tin khuyến mại</a></li>
                        </ul>
                      </nav>
                  </div>
                  <div class="col-sm-5">
                      <div class="row">
                        <div class="col-md-8 search_box">
                            <form action="{{route('product.search')}}" class="form-inline" method="GET">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keywords" value="">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="col-md-4 icon-cart">
                            <a href="{{url('cart')}}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </a>
                            <span class="text-decoration-none">{{Cart::count()}}</span>
                        </div>
                      </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/header-bottom-->
      </header>
      <!--/header-->
      <div class="main">
          <div class="container">
            @yield('slider')
            <div class="row">
                <div class="col-4">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <!--category-productsr-->
                        <div class="panel-group category-products" id="accordian">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="">ĐIỆN THOẠI</a></h4>
                                    <h4 class="panel-title"><a href="">MÁY TÍNH BẢNG</a></h4>
                                    <h4 class="panel-title"><a href="">LAPTOP</a></h4>
                                    <h4 class="panel-title"><a href="">MÁY CHỤP ẢNH</a></h4>
                                </div>
                            </div>
                        </div><!--/category-products-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> <span class="pull-right">IPHONE</span></a></li>
                                    <li><a href="#"> <span class="pull-right">SAMSUNG</span></a></li>
                                    <li><a href="#"> <span class="pull-right">SONY</span></a></li>
                                    <li><a href="#"> <span class="pull-right">SONY</span></a></li>
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                    </div>
                </div>
                <div class="col-8">
                    @yield('content')
                </div>
            </div>
          </div>
      </div>

          <!--Footer-->
        <footer id="footer" class="bg-secondary text-center text-warning mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        UNITOP.VN - HỌC ĐỂ DẪN ĐẦU
                    </div>
                </div>
            </div>
        </footer>

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        @yield('ajax_cart')
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   </body>
</html>
