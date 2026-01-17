<?php
require_once 'connection.php';

function addPizza($pizza){
    $conn = dbConnection();

    // Escape inputs (simple protection)
    $name = mysqli_real_escape_string($conn, $pizza['name']);
    $description = mysqli_real_escape_string($conn, $pizza['description']);
    $price = (float)$pizza['price'];
    $availability = mysqli_real_escape_string($conn, $pizza['availability']);

    // Check duplicate pizza name
    $checkQuery = "SELECT id FROM pizzas WHERE name='$name'";
    $result = mysqli_query($conn, $checkQuery);

    if($result && mysqli_num_rows($result) > 0){
        return false;
    }

    // Correct insert query (matches your DB table)
    $query = "INSERT INTO pizzas (name, description, price, availability)
              VALUES ('$name', '$description', $price, '$availability')";

    return mysqli_query($conn, $query) ? true : false;
}
?>
