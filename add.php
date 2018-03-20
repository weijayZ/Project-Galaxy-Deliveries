<?php
    session_set_cookie_params(0);
    session_start();
    error_reporting(0);

    $pid = $_POST['pid'];
    $id = $_SESSION['id'];
    $quantity = $_POST['quantity'];
    $date = date("Y-m-d h:i:sa");
    $price = $_POST['price'];
    $sPrice = $quantity * $price;
    $_SESSION['cart'][$_SESSION['iCount']] = array($id,$pid,$date,$quantity,$sPrice,$_SESSION['iCount']);
    $_SESSION['iCount'] ++;
    echo $_SESSION['iCount'];
?>