<?php
require_once 'pizza.php';

function placeOrder($userId, $cart)
{
    $conn = dbConnection();

    $userId = (int)$userId;
    if ($userId <= 0 || empty($cart) || !is_array($cart)) {
        return false;
    }

    mysqli_begin_transaction($conn);

    try {
        $total = 0.0;
        $deliveryFee = 60.00;

        // Calculate total from cart
        foreach ($cart as $pizzaId => $qty) {
            $pizzaId = (int)$pizzaId;
            $qty = (int)$qty;

            if ($pizzaId <= 0 || $qty <= 0) continue;

            $pizza = getPizzaById($pizzaId);
            if (!$pizza) continue; // pizza deleted / not found

            $price = (float)$pizza['price'];
            $total += ($price * $qty);
        }

        if ($total <= 0) {
            throw new Exception("No valid items in cart.");
        }

        $total = (float)($total + $deliveryFee);

        // Insert order
        $orderQuery = "INSERT INTO orders (customer_id, total_amount)
                       VALUES ($userId, $total)";
        $orderRes = mysqli_query($conn, $orderQuery);
        if (!$orderRes) {
            throw new Exception("Order insert failed: " . mysqli_error($conn));
        }

        $orderId = (int)mysqli_insert_id($conn);
        if ($orderId <= 0) {
            throw new Exception("Failed to get order id.");
        }

        // Insert order items
        foreach ($cart as $pizzaId => $qty) {
            $pizzaId = (int)$pizzaId;
            $qty = (int)$qty;

            if ($pizzaId <= 0 || $qty <= 0) continue;

            $pizza = getPizzaById($pizzaId);
            if (!$pizza) continue;

            $price = (float)$pizza['price'];

            $itemQuery = "INSERT INTO order_items (order_id, pizza_id, quantity, price)
                          VALUES ($orderId, $pizzaId, $qty, $price)";
            $itemRes = mysqli_query($conn, $itemQuery);
            if (!$itemRes) {
                throw new Exception("Order item insert failed: " . mysqli_error($conn));
            }
        }

        mysqli_commit($conn);
        return $orderId; // ✅ return new order id

    } catch (Exception $e) {
        mysqli_rollback($conn);
        return false;
    }
}

/* Get all orders for a customer (Order history) */
function getOrdersByCustomerId($customerId)
{
    $conn = dbConnection();
    $customerId = (int)$customerId;

    $query = "SELECT id, total_amount, status, created_at
              FROM orders
              WHERE customer_id = $customerId
              ORDER BY id DESC";

    $result = mysqli_query($conn, $query);

    $orders = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
    }
    return $orders;
}

