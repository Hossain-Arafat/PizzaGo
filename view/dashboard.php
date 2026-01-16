<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
	header("Location: login.php");
	exit();
}
$activePage = "dashboard";
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
                <h2>1,234</h2>
            </div>
            <div class="card">
                <p>Total Sales</p>
                <h2>$45,678</h2>
            </div>
            <div class="card">
                <p>Total Customers</p>
                <h2>456</h2>
            </div>
            <div class="card">
                <p>Total Staff</p>
                <h2>12</h2>
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
                <tr>
                    <td>#12345</td>
                    <td>John Doe</td>
                    <td>Jan 14, 2026</td>
                    <td>$40.77</td>
                    <td><span class="status preparing">Preparing</span></td>
                </tr>
                <tr>
                    <td>#12344</td>
                    <td>Jane Smith</td>
                    <td>Jan 14, 2026</td>
                    <td>$27.49</td>
                    <td><span class="status delivered">Delivered</span></td>
                </tr>
                <tr>
                    <td>#12343</td>
                    <td>Bob Johnson</td>
                    <td>Jan 13, 2026</td>
                    <td>$45.99</td>
                    <td><span class="status ready">Ready</span></td>
                </tr>
            </table>
        </div>

        <div class="box">
            <h3>Sales Overview</h3>
            <div class="chart">
                <div style="height:45%">Jan</div>
                <div style="height:55%">Feb</div>
                <div style="height:50%">Mar</div>
                <div style="height:65%">Apr</div>
                <div style="height:60%">May</div>
                <div style="height:75%">Jun</div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>

</body>
</html>
