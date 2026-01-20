<?php
session_start();
require_once "../model/pizza.php";

if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: ../view/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_availability'])) {
    $checked = $_POST['availability'] ?? [];

    $inStockIds = [];
    if (is_array($checked)) {
        foreach ($checked as $pizzaId => $val) {
            $inStockIds[] = (int)$pizzaId;
        }
    }

    updatePizzaAvailabilityBulk($inStockIds);

    header("Location: ../view/availability.php");
    exit();
}

header("Location: ../view/availability.php");
exit();
