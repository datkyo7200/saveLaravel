<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/sanpham.css')}}">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery_easing.js')}}"></script>
    <script type="text/javascript">

    jQuery(function($) {

    $('.add-to-cart').click(function() {
        var cart = $('.shopping_bg');
        var imgtofly = $(this).parents('li.cart_items').find('a.product-image img').eq(0);
        if (imgtofly) {
                var imgclone = imgtofly.clone()
                    .offset({ top:imgtofly.offset().top, left:imgtofly.offset().left })
                    .css({'opacity':'0.7', 'position':'absolute', 'height':'150px', 'width':'150px', 'z-index':'1000'})
                    .appendTo($('body'))
                    .animate({
                        'top':cart.offset().top + 10,
                        'left':cart.offset().left + 30,
                        'width':55,
                        'height':55
                    }, 1000, 'easeInElastic');
                imgclone.animate({'width':0, 'height':0}, function(){ $(this).detach() });
            }
            return false;
        });
    });
</script>
</head>
<body>
<div class="header text-lg-center">
    <h1>Shop ThanhDat</h1>
    <h2>Demo Jquery</h2>
</div>
<div class="container">
    <div class="shopping_bg">
        <img src="{{asset('images/cart.png')}}" alt="">
    </div>
    <div>
        <ul>
            <li class="cart_items">
              <div class="content"> <a  href="javascript:;" class="product-image" title="Product 1" >
              <img class="thumbnail" src="{{asset('images/product-1.jpg')}}" alt="Product 1" /> </a> </div>
              <button type="button" title="Add to Cart" class="add-to-cart">Add to Cart</button>
            </li>
            <li class="cart_items">
              <div class="content"> <a  href="javascript:;" class="product-image" title="Product 2" >
              <img class="thumbnail" src="{{asset('images/product-2.jpg')}}" alt="Product 2" /> </a> </div>
              <button type="button" title="Add to Cart" class="add-to-cart">Add to Cart</button>
            </li>
          </ul>
    </div>
</div>
</body>
</html>
