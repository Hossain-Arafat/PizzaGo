<?php
session_start();
$activePage = 'orders';

/* If no orders exist yet, create empty array */
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders</title>
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
                <?php if (empty($_SESSION['orders'])) { ?>
                    <tr>
                        <td colspan="4" class="empty-row">No orders placed yet.</td>
                    </tr>
                <?php } else { ?>

                    <?php
                    // Show latest orders first
                    $orders = array_reverse($_SESSION['orders']);
                    foreach ($orders as $order) {
                    ?>
                        <tr>
                            <td>#<?php echo $order['id']; ?></td>
                            <td><?php echo $order['date']; ?></td>
                            <td>$<?php echo number_format($order['total'], 2); ?></td>
                            <td>
                                <span class="status preparing"><?php echo $order['status']; ?></span>
                            </td>
                        </tr>
                    <?php } ?>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
