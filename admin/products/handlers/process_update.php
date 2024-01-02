<?php

require '../../../config/connect.php';

if(empty($_POST['product_name']) || empty($_POST['price']) || empty($_POST['description']) || empty($_POST['manufacturer_id'])){
    header("location: ../index.php?error=require to enter full information");
}


$id = $_POST['id'];
$product_name = $_POST['product_name'];
$photo_new = $_FILES['photo_new'];
if($photo_new['size'] > 0){
    $folder = '../../../assets/temp/imgs/';
    $file_extension = explode('.', $photo_new["name"])[1];
    $file_name = time() . basename($photo_new["name"]);
    $path_file = $folder . $file_name;

    move_uploaded_file($photo_new["tmp_name"], $path_file);
}else{
    $file_name = $_POST['photo_old'];
}

$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];

$sql = "update products
set
product_name = '$product_name',
photos = '$file_name',
price = '$price',
description = '$description',
manufacturer_id = '$manufacturer_id'
where
id = '$id'";

mysqli_query($conn, $sql);
mysqli_close($conn);
header("location: ../index.php?success=Successfully");