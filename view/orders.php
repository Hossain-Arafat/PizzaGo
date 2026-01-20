<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
$activePage = 'orders';

require_once "../model/order.php";

$userId = (int)($_SESSION['user_id'] ?? 0);
if ($userId <= 0) {
    header("Location: login.php");
    exit();
}

$orders = getOrdersByCustomerId($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PizzaGo|Order History</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/orders.css">
</head>
<body>

<?php include "header.php"; ?>
<?php include "navigationBar.php"; ?>

<div class="orders-wrapper">
    <h1 class="orders-title">Order History</h1>

    <div class="orders-card">
        <table class="orders-table">
            <thead>
                <tr>
                    <th>ORDER ID</th>
                    <th>ORDER DATE</th>
                    <th>TOTAL AMOUNT</th>
                    <th>ORDER STATUS</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($orders)) : ?>
                    <?php foreach ($orders as $o) : ?>
                        <tr>
                            <td>#<?= (int)$o['id'] ?></td>
                            <td><?= date("d M Y", strtotime($o['created_at'])) ?></td>
                            <td>৳<?= number_format((float)$o['total_amount'], 2) ?></td>
                            <td>
                                <span class="status preparing">
                                    <?= htmlspecialchars($o['status']) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="empty-cell">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
