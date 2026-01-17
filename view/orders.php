<?php
session_start();
$activePage = 'orders';
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
                        <tr>
                            <td>#123</td>
                            <td>12jan-2026</td>
                            <td>1200</td>
                            <td>
                                <span class="status preparing">preparing</span>
                            </td>
                        </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
