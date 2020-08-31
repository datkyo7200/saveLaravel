$(document).ready(function() {
    $("#num_order").change(function() {
        var price = $("#price").text();
        var num_order = $("#num_order").val();
        var data = { num_order: num_order, price: price };

        $.ajax({
            url: 'process.php', // trang xu ly
            method: 'POST',
            dataType: 'json',
            data: data, //du lieu truyen len server
            success: function(data) {
                // alert(data.total);
                // console.log(data);
                // $("#total").text(data);
                $("#total").html("<strong>" + data + "</strong>");
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        });
    })
});