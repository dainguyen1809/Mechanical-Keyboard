<?php

$conn = mysqli_connect("localhost","root","","mechanical keyboard");

$check = mysqli_error($conn);

if($check){
    die($check);
}else{
    echo "success";
}