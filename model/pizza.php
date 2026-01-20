<?php
require_once 'connection.php';

function addPizza($pizza){
    $conn = dbConnection();

    $name = mysqli_real_escape_string($conn, $pizza['name']);
    $description = mysqli_real_escape_string($conn, $pizza['description']);
    $price = (float)$pizza['price'];
    $availability = mysqli_real_escape_string($conn, $pizza['availability']);

    $checkQuery = "SELECT id FROM pizzas WHERE name='$name'";
    $result = mysqli_query($conn, $checkQuery);

    if($result && mysqli_num_rows($result) > 0){
        return false;
    }

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

function updatePizzaAvailabilityBulk($inStockIds)
{
    $conn = dbConnection();

    $q1 = "UPDATE pizzas SET availability='out_of_stock'";
    mysqli_query($conn, $q1);

    if (!empty($inStockIds)) {
        $safeIds = [];
        foreach ($inStockIds as $id) {
            $id = (int)$id;
            if ($id > 0) $safeIds[] = $id;
        }

        if (!empty($safeIds)) {
            $idList = implode(",", $safeIds);
            $q2 = "UPDATE pizzas SET availability='in_stock' WHERE id IN ($idList)";
            mysqli_query($conn, $q2);
        }
    }

    return true;
}

?>
