<?php

session_start();
$cart = $_SESSION['cart'];

$name_receiver = $_POST['name_receiver'];
$address_receiver = $_POST['address_receiver'];
$phone_receiver = $_POST['phone_receiver'];

require '../config/connect.php';

$total_amount = 0;

foreach ($cart as $row) {
    $total_amount += $row['quantity'] * $row['price'];
}

$customer_id = $_SESSION['id'];
$status = 0; // mới đặt hàng

$sql = "insert into orders(customer_id, name_receiver, address_receiver, phone_receiver, status, total_amount)
values('$customer_id', '$name_receiver', '$address_receiver', '$phone_receiver', '$status', '$total_amount')";
mysqli_query($conn, $sql);

$sql = "select max(id) from orders where customer_id = '$customer_id'";
$result = mysqli_query($conn, $sql);
$order_id = mysqli_fetch_array($result)['max(id)'];

foreach ($cart as $product_id => $row) {
    $quantity = $row['quantity'];
    $sql = "insert into order_details(order_id, product_id, quantity)
    values('$order_id', '$product_id', '$quantity')";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);
unset($_SESSION['cart']);

header("location: ../customer.php?success=Your order has been comfirmed!");