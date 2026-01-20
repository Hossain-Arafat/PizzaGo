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

        foreach ($cart as $pizzaId => $qty) {
            $pizzaId = (int)$pizzaId;
            $qty = (int)$qty;

            if ($pizzaId <= 0 || $qty <= 0) continue;

            $pizza = getPizzaById($pizzaId);
            if (!$pizza) continue;

            $price = (float)$pizza['price'];
            $total += ($price * $qty);
        }

        if ($total <= 0) {
            throw new Exception("No valid items in cart.");
        }

        $total = (float)($total + $deliveryFee);

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
        return $orderId; 

    } catch (Exception $e) {
        mysqli_rollback($conn);
        return false;
    }
}

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

function getAdminDashboardStats()
{
    $conn = dbConnection();

    $q1 = "SELECT COUNT(*) AS total_orders FROM orders";
    $r1 = mysqli_query($conn, $q1);
    $totalOrders = ($r1) ? (int)mysqli_fetch_assoc($r1)['total_orders'] : 0;

    $q2 = "SELECT IFNULL(SUM(total_amount), 0) AS total_sales FROM orders";
    $r2 = mysqli_query($conn, $q2);
    $totalSales = ($r2) ? (float)mysqli_fetch_assoc($r2)['total_sales'] : 0;

    return [
        "total_orders" => $totalOrders,
        "total_sales"  => $totalSales
    ];
}

function getRecentOrdersForAdmin()
{
    $conn = dbConnection();

    $query = "SELECT 
                o.id,
                o.total_amount,
                o.status,
                o.created_at,
                u.name AS customer_name,
                u.email AS customer_email
              FROM orders o
              JOIN users u ON u.id = o.customer_id
              ORDER BY o.id DESC";

    $result = mysqli_query($conn, $query);

    $orders = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
    }
    return $orders;
}
function getOrderDetailsForUpdate($orderId)
{
    $conn = dbConnection();
    $orderId = (int)$orderId;

    $query = "SELECT 
                o.id, o.status, o.created_at,
                u.name AS customer_name
              FROM orders o
              JOIN users u ON u.id = o.customer_id
              WHERE o.id = $orderId
              LIMIT 1";

    $result = mysqli_query($conn, $query);
    if (!$result || mysqli_num_rows($result) !== 1) {
        return null;
    }

    $order = mysqli_fetch_assoc($result);

    $itemsQuery = "SELECT p.name
                   FROM order_items oi
                   JOIN pizzas p ON p.id = oi.pizza_id
                   WHERE oi.order_id = $orderId";

    $itemsResult = mysqli_query($conn, $itemsQuery);

    $names = [];
    if ($itemsResult) {
        while ($row = mysqli_fetch_assoc($itemsResult)) {
            $names[] = $row['name'];
        }
    }

    $order['items'] = implode(", ", $names);
    return $order;
}

function updateOrderStatus($orderId, $status)
{
    $conn = dbConnection();
    $orderId = (int)$orderId;
    $status = mysqli_real_escape_string($conn, $status);

    $query = "UPDATE orders SET status='$status' WHERE id=$orderId";
    return mysqli_query($conn, $query) ? true : false;
}

?>