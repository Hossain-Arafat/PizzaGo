<?php
$activePage = "orders_sales";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details - PizzaGo</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/order_details.css">
</head>

<body>

<?php include "header.php"; ?>

<div class="od-wrap">
    <?php require "sidebar.php"; ?>

    <div class="od-main">
        <h1>Order Details</h1>

        <div class="od-top">
            <div class="od-card">
                <h3>Order Summary</h3>
                <div class="od-row"><span>Order ID:</span><span>#12345</span></div>
                <div class="od-row"><span>Order Date:</span><span>Jan 14, 2026</span></div>
                <div class="od-row"><span>Order Time:</span><span>2:30 PM</span></div>
                <div class="od-row">
                    <span>Status:</span>
                    <span class="od-status preparing">Preparing</span>
                </div>
            </div>

            <div class="od-card">
                <h3>Customer Information</h3>
                <div class="od-row"><span>Name:</span><span>John Doe</span></div>
                <div class="od-row"><span>Email:</span><span>john.doe@email.com</span></div>
                <div class="od-row"><span>Phone:</span><span>+1 234 567 8900</span></div>
            </div>
        </div>

        <div class="od-card">
            <h3>Ordered Items</h3>

            <div class="od-item">
                <div>
                    <strong>Margherita</strong>
                    <p>Quantity: 2</p>
                </div>
                <span>$25.98</span>
            </div>

            <div class="od-item">
                <div>
                    <strong>Pepperoni</strong>
                    <p>Quantity: 1</p>
                </div>
                <span>$14.99</span>
            </div>

            <div class="od-summary">
                <div><span>Subtotal:</span><span>$40.97</span></div>
                <div><span>Tax (10%):</span><span>$4.10</span></div>
                <div class="od-total"><span>Total:</span><span>$45.07</span></div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
