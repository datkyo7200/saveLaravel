<?php
    $price = $_POST["price"];
    $num_order = $_POST["num_order"];
    // Lấy thông tin sản phẩm
    $total = 0;
    $subtotal = $num_order * $price;
    $total += $subtotal;
    $result = array(
        'subtotal' => $subtotal,
        'total' => $total,
        );
    echo json_encode($result);
?>