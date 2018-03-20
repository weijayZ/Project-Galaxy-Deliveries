<?php
    session_set_cookie_params(0);
    session_start();
    error_reporting(0);
    $id = $_POST['item'];
    unset($_SESSION['cart'][$id]);
?>