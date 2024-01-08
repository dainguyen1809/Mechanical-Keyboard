<?php

require '../config/connect.php';

session_start();

// unset($_SESSION['cart']);

$id = $_GET['id'];

//check cart have items been added?
if(empty($_SESSION['cart'][$id])){
    //case: nothing in the cart
    // add id items
    require '../config/connect.php';

    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
/* 
    id = 7 => [
        'product name' = 'prod 1',
        'photos' = 'abc.jpg',
        'price'  = 123,
        quantity = 1
    ]
    ...
*/
    
    $_SESSION['cart'][$id]['product_name'] = $row['product_name'];
    $_SESSION['cart'][$id]['photos'] = $row['photos'];
    $_SESSION['cart'][$id]['price'] = $row['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;

} else{
    
    //case: there have been items in the cart
    //check to the cart

    //if there have been items    
    $_SESSION['cart'][$id]['quantity']++;
}

header("location: ../cart.php");
mysqli_close($conn);
// echo json_encode($_SESSION['cart']);