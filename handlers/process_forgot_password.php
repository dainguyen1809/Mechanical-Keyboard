<?php

function current_url()
{
    $url      = "http://"  . $_SERVER['HTTP_HOST'] . "/projects/Mechanical%20Keyboard/";
    return $url;
}


$email = $_POST['email'];

require '../config/connect.php';


$sql = "select id,customer_name from customers where email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $each = mysqli_fetch_array($result);

    $id = $each['id'];
    $customer_name = $each['customer_name'];

    $sql = "delete from forgot_password
    where customer_id = '$id'";
    mysqli_query($conn, $sql);

    $token = uniqid();

    $sql = "insert into forgot_password(customer_id, token)
    values('$id', '$token')";
    mysqli_query($conn, $sql);

    $link = current_url() . '/change_new_password.php?token=' . $token;

    //die($link);

    require '../mail.php';
    $title = 'change new password';
    $content = "Your password was changed!<br>
    Please <a href='$link'>click here</a> to change new password";
    sendmail($email, $customer_name, $title, $content);
}

mysqli_close($conn);
header("location: ../signin.php");