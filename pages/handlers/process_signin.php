<?php

require '../../config/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from customers
where email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$num_row = mysqli_num_rows($result); // count all

if($num_row == 1){
    session_start();
    $each = mysqli_fetch_array($result);
    $_SESSION["id"] = $each['id'];
    $_SESSION["customer_name"] =  $each['customer_name'];

    header("location: ../index.php");
    exit;
}

header("location: ../signin.php?error=username or password is incorrect");