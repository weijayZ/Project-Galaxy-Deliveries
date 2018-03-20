<?php
    session_set_cookie_params(0);
    session_start();
    error_reporting(0);
    require_once 'sqlinfo.php';

    $connInfo = getSqlinfo();
    $conn = new mysqli($connInfo->servername, $connInfo->username, $connInfo->password, $connInfo->dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

    $sql = "INSERT INTO orders(cID,idNum,orderDate,quantity,saleprice) VALUES";
    
    if(empty($_SESSION['cart'])){
        echo 'fail';
    } else{
        foreach ($_SESSION['cart'] as &$value) {
            $sql .= "('$value[0]','$value[1]','$value[2]','$value[3]','$value[4]'),";
            $sum += $value[4];
        }
        $sql = rtrim($sql,',');
        $result = $conn->query($sql);

        clearConnection($conn);
        $date = date("Y-m-d h:i:sa");
        $id = $_SESSION['id'];
        $sql2 = "INSERT INTO billed(orderDate,cID,price) VALUES('$date', '$id', $sum)";
        $result2 = $conn->query($sql2);

        $_SESSION['cart'] = array();
        echo 'pass';
    }


?>