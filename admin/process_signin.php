<?php

require '../config/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from admin
where email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
    $each = mysqli_fetch_array($result);
    session_start();
    $_SESSION["id"] = $each["id"];
    $_SESSION["name"] = $each["name"];
    $_SESSION["level"] = $each["level"];

    header("location: root/");
    exit;
}

header("location: index.php?error=Username or Passowrd is incorrect!");