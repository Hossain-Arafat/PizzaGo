<?php
require_once "../model/pizza.php";

function addPizzaController(){
    $name = trim($_POST['pizza_name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $availability = trim($_POST['availability'] ?? 'in_stock');

    // basic validation
    if($name === '' || $description === '' || $price === '' || !is_numeric($price)){
        return false;
    }

    $pizza = [
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'availability' => $availability
    ];

    return addPizza($pizza);
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(addPizzaController()){
        header("location: ../view/manage_pizzas.php");
        exit();
    } else{
        echo "Something went wrong (validation / duplicate / DB error).";
    }
} else{
    echo "Invalid request.";
}
?>
