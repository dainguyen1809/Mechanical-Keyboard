<?php

require '../../../config/connect.php';

if(empty($_POST['id'])){
    header("location: ../index.php?error=ID Not Found");
    exit;    
}

$id = $_POST['id'];

if(empty($_POST['manufacturers_name']) || empty($_POST['address']) || empty($_POST['phone'])){
    header("location: ../index.php?error=Require to enter full information!");
    exit;
}

$manufacturers_name = $_POST['manufacturers_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "update manufacturers
set
manufacturers_name = '$manufacturers_name',
address = '$address',
phone = '$phone'
where
id = '$id'
";

mysqli_query($conn, $sql);

$check = mysqli_error($conn);

mysqli_close($conn);

if(!$check){
    header("location: ../index.php?success=update success");
}else{
    header("location: ../index.php?error=Error query");
}