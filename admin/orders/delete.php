<?php

require '../../config/connect.php';

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "delete from orders
where status = '$status' and id = '$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);

header("location: index.php");