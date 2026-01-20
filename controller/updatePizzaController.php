<?php
session_start();
require_once "../model/pizza.php";

if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: ../view/login.php");
    exit();
}

if (($_SESSION['role'] ?? '') !== 'admin') {
    header("Location: ../view/login.php");
    exit();
}

function updatePizzaController()
{
    if (!isset($_POST['id'], $_POST['pizza_name'], $_POST['description'], $_POST['price'], $_POST['availability'])) {
        return ["ok" => false, "msg" => "Invalid request."];
    }

    $id = trim($_POST['id']);
    $name = trim($_POST['pizza_name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $availability = trim($_POST['availability']);

    if ($id === '' || !is_numeric($id) || (int)$id <= 0) {
        return ["ok" => false, "msg" => "Invalid pizza id."];
    }

    if ($name === '' || $description === '' || $price === '') {
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
        'id' => (int)$id,
        'name' => $name,
        'description' => $description,
        'price' => (float)$price,
        'availability' => $availability
    ];

    $status = updatePizza($pizza);

    if ($status) {
        return ["ok" => true, "msg" => "Updated"];
    }
    return ["ok" => false, "msg" => "Update failed (duplicate name / DB error)."];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $result = updatePizzaController();

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
