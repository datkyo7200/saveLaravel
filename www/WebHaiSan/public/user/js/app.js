$(document).ready(function() {
    $("#num_order").change(function() {
        var id = $(this).attr("data-id");
        var price = $("#price").text();
        var num_order = $("#num_order").val();
        var data = { id: id, price: price, num_order: num_order };
        console.log(data);
        $.ajax({
            url: './views/user/pages/process.php', // trang xu ly
            method: 'POST',
            dataType: 'json',
            data: data, //du lieu truyen len server
            success: function(data) {
                $("#subtotal").text(data.subtotal);
                $("#total").text(data.total);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        });
    })
});