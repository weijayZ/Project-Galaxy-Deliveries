<?php

  require_once 'sqlinfo.php';
  $connInfo = getSqlinfo();
  $conn = new mysqli($connInfo->servername, $connInfo->username, $connInfo->password, $connInfo->dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  };
    
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fid = $_POST['fid'];

    if($user == null || $pwd == null || $fname == null || $lname == null || $fid ==null){
        echo "fail";
    } else{
        $sql = "INSERT INTO customer(fName, lName, fleetID, username, password, img)
        VALUES('$fname', '$lname', '$fid', '$user','$pwd', 'image/stock.jpg');";
        $result = $conn->query($sql);
        echo "pass";
    }
    
?>