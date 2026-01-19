<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}

$activePage = "dashboard";

require_once "../model/order.php";
require_once "../model/user.php";

$stats = getAdminDashboardStats();
$totalOrders = $stats['total_orders'] ?? 0;
$totalSales  = $stats['total_sales'] ?? 0;

$totalCustomers = countUsersByRole('customer');
$totalStaff     = countUsersByRole('staff');

$recentOrders = getRecentOrdersForAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - PizzaGo</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<?php include "header.php" ?>

<div class="dashboard-layout">
    <?php require "sidebar.php"; ?>

    <div class="main">
        <h1>Dashboard</h1>

        <div class="cards">
            <div class="card">
                <p>Total Orders</p>
                <h2><?= number_format($totalOrders) ?></h2>
            </div>
            <div class="card">
                <p>Total Sales</p>
                <h2>৳<?= number_format($totalSales, 2) ?></h2>
            </div>
            <div class="card">
                <p>Total Customers</p>
                <h2><?= number_format($totalCustomers) ?></h2>
            </div>
            <div class="card">
                <p>Total Staff</p>
                <h2><?= number_format($totalStaff) ?></h2>
            </div>
        </div>

        <div class="box">
            <h3>Recent Orders</h3>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>

                <?php if (!empty($recentOrders)) : ?>
                    <?php foreach ($recentOrders as $o) : ?>
                        <tr>
                            <td>#<?= (int)$o['id'] ?></td>
                            <td><?= htmlspecialchars($o['customer_name']) ?></td>
                            <td><?= date("M d, Y", strtotime($o['created_at'])) ?></td>
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
                        <td colspan="5" style="text-align:center; padding:14px;">
                            No recent orders found.
                        </td>
                    </tr>
                <?php endif; ?>

            </table>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
</body>
</html>
