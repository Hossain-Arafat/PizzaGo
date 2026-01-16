<?php
function dbConnection()
{
    $hostName  = "localhost";
    $userName  = "root";
    $password  = "";
    $dbName = "pizzago";

    $conn = mysqli_connect($hostName, $userName, $password, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
