<?php
session_start();
require_once "../model/order.php";

if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: ../view/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {

    $orderId = (int)($_POST['order_id'] ?? 0);
    $status  = strtolower(trim($_POST['status'] ?? ''));

    // Allow only valid enum values
    $allowed = ['pending', 'preparing', 'ready', 'delivered'];
    if ($orderId <= 0 || !in_array($status, $allowed)) {
        header("Location: ../view/assigned.php");
        exit();
    }

    $ok = updateOrderStatus($orderId, $status);

    // Redirect back
    header("Location: ../view/assigned.php");
    exit();
}

header("Location: ../view/assigned.php");
exit();
