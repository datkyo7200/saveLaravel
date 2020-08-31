<div id="dropdown">
   <p class="desc">Có <span>
      2 sản phẩm</span> trong giỏ hàng
   </p>
   <ul class="list-cart">
      <li class="clearfix">
         <a href="" title="" class="thumb fl-left">
         <img iphone-xs-max-256gb-white-400x400.jpg="" <="" a="">
         </a>
         <div class="info fl-right">
            <a href="" title="" class="thumb fl-left">
            </a><a href="" title="" class="product-name">iPhone XS MAX 64GB</a>
            <p class="price"> 600,000đ</p>
            <p class="qty"> Số lượng: <span>1</span></p>
         </div>
      </li>
      <li class="clearfix">
         <a href="" title="" class="thumb fl-left">
         <img xiaomi-redmi-note-9s-4gb-green-400x460-400x400.jpg="" <="" a="">
         </a>
         <div class="info fl-right">
            <a href="" title="" class="thumb fl-left">
            </a><a href="" title="" class="product-name">Xiaomi Redmi Note 9S</a>
            <p class="price">5,990,000đ</p>
            <p class="qty">Số lượng: <span>1</span></p>
         </div>
      </li>
   </ul>
   <dic class="action-cart clearfix">
      <a href="?mod=cart&amp;controller=index&amp;action=show" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
      <a href="?mod=cart&amp;controller=index&amp;action=checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
   </dic>
</div>
<script>

    $(document).ready(function () {
        $(".num-order").change(function () {
            var id = $(this).attr('data-id');
            var qty = $(this).val();
            var data = {id:id,qty:qty};
            $.ajax({
                url: '?mod=cart&controller=index&action=update_ajax',
                method: 'post',
                data: data,
                dataType: 'json',
                success: function (data) {
                    $(".sub_total-"+id).text(data.sub_total)
                    $("#total-price span").text(data.total);
                },
                error: function (xhr, ajaxOption, thrownError) {
                    alert(xhr.ajaxOption);
                    alert(thrownError);
                }
            });
        });

    });
</script>