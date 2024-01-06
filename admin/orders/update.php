<?php

require '../../config/connect.php';

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "update orders
set
status = '$status'
where id = '$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);

header("location: index.php");