<?php

require '../config/connect.php';

$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "select count(*) from customers
where email = '$email'";
$result = mysqli_query($conn, $sql);
$num_row = mysqli_fetch_array($result)['count(*)'];

if($num_row == 1){
    session_start();
    $_SESSION['error'] = 'email has been used';
    header("location: ../signup.php");
    exit;
} 
$sql = "insert into customers(customer_name, email, password,phone,address)
values('$customer_name', '$email', '$password', '$phone', '$address')";
mysqli_query($conn, $sql);

require '../mail.php';

$title = "Đăng ký tài khoản thành công !";
// $content = "Chào mừng bạn đến với <a href='https://kicap.vn'>Keyzone</a>!<br><h3>Store chuyên về bàn phím custom</h3>";
$content = "Test feature send emali when customer register account";

sendmail($email, $customer_name, $title, $content);

//initialize session

session_start();
$sql = "select id from customers
where email = '$email'";
$result = mysqli_query($conn, $sql);
$id = mysqli_fetch_array($result)['id'];

$_SESSION['id'] = $id;
$_SESSION['customer_name'] = $customer_name;

mysqli_close($conn);
header("location: ../index.php");