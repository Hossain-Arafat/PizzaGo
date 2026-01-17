<?php
require_once "../model/pizza.php";

function deletePizzaController(){
    $id = trim($_POST['id'] ?? '');

    if($id === '' || !is_numeric($id)){
        return false;
    }

    return deletePizza((int)$id);
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(deletePizzaController()){
        header("location: ../view/manage_pizzas.php");
        exit();
    } else {
        echo "Delete failed (invalid id / DB error).";
    }
} else {
    echo "Invalid request.";
}
?>
