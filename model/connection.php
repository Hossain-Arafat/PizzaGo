<?php
function dbConnection(){
    $hostName  = "localhost";
    $userName  = "root";
    $password  = "";
    $dbName = "pizzago";

    $conn = mysqli_connect($hostName, $userName, $password, $dbName);

    if($conn){
        echo "Connection Successful";
        return $conn;
    } else{
        echo "Connection Failed";
        die("Connection failed: " . mysqli_connect_error());
        return false;
    }
}
?>