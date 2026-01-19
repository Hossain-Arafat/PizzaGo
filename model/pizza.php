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
function getAllPizzas(){
    $conn = dbConnection();

    $query = "SELECT * FROM pizzas ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    $pizzas = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $pizzas[] = $row;
        }
    }
    return $pizzas;
}

function getPizzaById($id){
    $conn = dbConnection();
    $id = (int)$id;

    $query = "SELECT * FROM pizzas WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) === 1){
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function updatePizza($pizza){
    $conn = dbConnection();

    $id = (int)$pizza['id'];
    $name = mysqli_real_escape_string($conn, $pizza['name']);
    $description = mysqli_real_escape_string($conn, $pizza['description']);
    $price = (float)$pizza['price'];
    $availability = mysqli_real_escape_string($conn, $pizza['availability']);

    // prevent duplicate name for other pizzas
    $checkQuery = "SELECT id FROM pizzas WHERE name='$name' AND id <> $id";
    $checkResult = mysqli_query($conn, $checkQuery);
    if($checkResult && mysqli_num_rows($checkResult) > 0){
        return false;
    }

    $query = "UPDATE pizzas 
              SET name='$name',
                  description='$description',
                  price=$price,
                  availability='$availability'
              WHERE id=$id";

    return mysqli_query($conn, $query) ? true : false;
}

function deletePizza($id){
    $conn = dbConnection();
    $id = (int)$id;

    $query = "DELETE FROM pizzas WHERE id=$id";
    return mysqli_query($conn, $query) ? true : false;
}

function getAvailablePizzasForMenu(){
    $conn = dbConnection();

    // If you want to show all pizzas, remove the WHERE condition
    $query = "SELECT id, name, description, price, availability
              FROM pizzas
              ORDER BY id DESC ";

    $result = mysqli_query($conn, $query);

    $pizzas = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $pizzas[] = $row;
        }
    }
    return $pizzas;
}

?>
