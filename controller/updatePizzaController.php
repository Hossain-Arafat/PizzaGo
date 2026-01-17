<?php
require_once "../model/pizza.php";

function updatePizzaController(){
    $id = trim($_POST['id'] ?? '');
    $name = trim($_POST['pizza_name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $availability = trim($_POST['availability'] ?? 'in_stock');

    if($id === '' || !is_numeric($id)) return false;
    if($name === '' || $description === '' || $price === '' || !is_numeric($price)) return false;

    $pizza = [
        'id' => (int)$id,
        'name' => $name,
        'description' => $description,
        'price' => (float)$price,
        'availability' => $availability
    ];

    return updatePizza($pizza);
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(updatePizzaController()){
        header("location: ../view/manage_pizzas.php");
        exit();
    } else {
        echo "Update failed (invalid input / duplicate name / DB error).";
    }
} else {
    echo "Invalid request.";
}
?>
