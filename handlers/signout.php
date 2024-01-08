<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['customer_name']);

setcookie('remember',null, time() -1);

header("location: ../index.php");