<?php

if(empty($_POST['manufacturers_name']) || empty($_POST['address']) || empty($_POST['phone'])){
    header("location: ./form_insert.php?error=require to enter full information");
}

$manufacturers_name = $_POST['manufacturers_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

require '../../../config/connect.php';

$sql = "insert into manufacturers(manufacturers_name, address, phone)
values('$manufacturers_name', '$address', '$phone')";

mysqli_query($conn, $sql);
mysqli_close( $conn );

header("location: ../index.php?success=create success");