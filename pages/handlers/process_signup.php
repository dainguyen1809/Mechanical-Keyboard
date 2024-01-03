<?php

require '../../config/connect.php';

$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select count(*) from customers
where email = '$email'";
$result = mysqli_query($conn, $sql);
$num_row = mysqli_fetch_array($result)['count(*)'];

if($num_row == 1){
    header("location: ../signup.php?error=email has been used");
    exit;
} 
$sql = "insert into customers(customer_name, email, password)
values('$customer_name', '$email', '$password')";
mysqli_query($conn, $sql);

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