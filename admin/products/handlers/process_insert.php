<?php

require '../../../config/connect.php';

if(empty($_POST['product_name']) || empty($_POST['photos']) || empty($_POST['price']) || empty($_POST['description']) || empty($_POST['manufacturer_id'])){
    header("location: ../index.php?error=require to enter full information");
}

$product_name = $_POST['product_name'];
$photos = $_FILES['photos'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];

$folder = '../../../assets/temp/imgs/';
$file_extension = explode('.', $photos["name"])[1];
$file_name = time() . basename($photos["name"]);
$path_file = $folder . $file_name;

move_uploaded_file($photos["tmp_name"], $path_file);

$sql = "insert into products(product_name, photos, price, description, manufacturer_id)
values('$product_name', '$file_name', '$price', '$description', '$manufacturer_id')";

mysqli_query($conn, $sql);
mysqli_close($conn);
header("location: ../index.php?success=Successfully");