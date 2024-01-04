<?php

require '../../config/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remember = true;
} else {
    $remember = false;
}


$sql = "select * from customers
where email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result); // count all

if($num_rows == 1){
    echo "Wellcome My Store!";
    session_start();
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION["id"] = $id;
    $_SESSION["customer_name"] =  $each['customer_name'];

    if($remember){
        $token = uniqid('user_', true);
        $sql = "update customers
        set token = '$token'
        where id = '$id'";
        mysqli_query($conn, $sql);
        setcookie('remember', $token, time() + (86400 * 30));
    } 
}

// header("location: ../signin.php?error=username or password is incorrect");