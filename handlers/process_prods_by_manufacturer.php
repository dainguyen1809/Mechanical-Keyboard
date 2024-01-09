<?php

$id = $_GET['id'];

require '../config/connect.php';

$sql = "select manufacturers.*, products.photos, products.product_name from manufacturers
join products on manufacturers.id = products.manufacturer_id
WHERE manufacturers.id = '$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);

header("loca");