<?php
    session_set_cookie_params(0);
    session_start();
    error_reporting(0);

    $_SESSION['cart'] = array();
    $_SESSION['iCount'] = 0;
    echo 'worked';
?>