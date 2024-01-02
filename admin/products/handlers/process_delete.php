<?php

require '../../../config/connect.php';

$id = $_POST['id'];

$sql = "delete from products where id = '$id'";

mysqli_query($conn, $sql);
$check = mysqli_error($conn);
if(!$check){
    header("location: ../index.php?success=Deleted !");
}
mysqli_close($conn);