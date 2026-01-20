<?php
session_start();
require_once "../model/pizza.php";

if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: ../view/login.php");
    exit();
}

function addPizzaController()
{
    if (!isset($_POST['pizza_name'], $_POST['description'], $_POST['price'], $_POST['availability'])) {
        return ["ok" => false, "msg" => "Invalid request."];
    }

    $name = trim($_POST['pizza_name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $availability = trim($_POST['availability']);

    if ($name === "" || $description === "" || $price === "") {
        return ["ok" => false, "msg" => "All fields are required."];
    }

    if (strlen($name) < 2) {
        return ["ok" => false, "msg" => "Pizza name must be at least 2 characters."];
    }

    if (!is_numeric($price) || (float)$price <= 0) {
        return ["ok" => false, "msg" => "Price must be a positive number."];
    }

    $allowed = ['in_stock', 'out_of_stock'];
    if (!in_array($availability, $allowed)) {
        return ["ok" => false, "msg" => "Invalid availability value."];
    }

    $pizza = [
        'name' => $name,
        'description' => $description,
        'price' => (float)$price,
        'availability' => $availability
    ];

    $status = addPizza($pizza);

    if ($status) {
        return ["ok" => true, "msg" => "Pizza added"];
    }
    return ["ok" => false, "msg" => "Something went wrong (duplicate / DB error)."];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $result = addPizzaController();

    if ($result["ok"]) {
        header("location: ../view/manage_pizzas.php");
        exit();
    } else {
        echo $result["msg"];
        exit();
    }
} else {
    echo "Invalid request.";
}
?>
