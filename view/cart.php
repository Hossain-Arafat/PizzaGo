<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
	header("Location: login.php");
	exit();
}
$activePage = 'cart';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>

    <!-- Keep these includes if your header/navbar/footer are separate files -->
    <?php include "header.php"; ?>
    <?php include "navigationBar.php"; ?>

    <div class="cart-wrapper">
        <h1 class="cart-title">Shopping Cart</h1>

        <div class="cart-layout">

            <!-- LEFT: CART TABLE CARD -->
            <div class="cart-card">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>PIZZA NAME</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>SUBTOTAL</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Dummy rows (replace later with DB output) -->
                        <tr>
                            <td>Margherita</td>
                            <td>$8.99</td>

                            <td>2</td>

                            <td>$17.98</td>

                            <td>
                                <form method="post" action="#">
                                    <input type="hidden" name="item_name" value="Margherita">
                                    <button type="button" class="delete-btn" title="Remove">🗑</button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>Pepperoni</td>
                            <td>$10.50</td>

                            <td>1</td>

                            <td>$10.50</td>

                            <td>
                                <form method="post" action="#">
                                    <input type="hidden" name="item_name" value="Pepperoni">
                                    <button type="button" class="delete-btn" title="Remove">🗑</button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <td>BBQ Chicken</td>
                            <td>$12.00</td>

                            <td>3</td>

                            <td>$36.00</td>

                            <td>
                                <form method="post" action="#">
                                    <input type="hidden" name="item_name" value="BBQ Chicken">
                                    <button type="button" class="delete-btn" title="Remove">🗑</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <!-- RIGHT: ORDER SUMMARY -->
            <div class="summary-card">
                <h2 class="summary-title">Order Summary</h2>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>$64.48</span>
                </div>

                <div class="summary-row">
                    <span>Tax (10%)</span>
                    <span>$6.45</span>
                </div>

                <div class="summary-line"></div>

                <div class="summary-total">
                    <span>Total</span>
                    <span>$70.93</span>
                </div>

                <form method="post" action="#">
                    <button type="button" class="place-btn">Place Order</button>
                </form>

            </div>

        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>
