<?php

require '../../../config/connect.php';

if(empty($_POST['id'])){
    header("location: ../index.php?error=ID Not Found");
    exit;    
}

$id = $_POST['id'];

$sql = "delete from manufacturers where id = '$id'";

mysqli_query($conn, $sql);

$check = mysqli_error($conn);

mysqli_close($conn);

if(!$check){
    header("location: ../index.php?success=Delete success");
}else{
    header("location: ../index.php?error=Cannot Delete");
}