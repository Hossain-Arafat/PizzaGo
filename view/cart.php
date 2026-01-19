<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
$activePage = 'cart';

require_once "../model/pizza.php";
$cart = $_SESSION['cart'] ?? [];
$total = 0;
$deliveryFee = 60.00;
if (empty($cart)) {
    $deliveryFee = 0;
}
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
                        <?php if (empty($cart)) : ?>
                            <tr>
                                <td colspan="5" style="text-align:center; padding:18px;">Cart is empty.</td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($cart as $pizzaId => $qty):
                            $pizza = getPizzaById($pizzaId);
                            if (!$pizza) continue;
                            $subtotal = $pizza['price'] * $qty;
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($pizza['name']) ?></td>
                                <td>৳<?= $pizza['price'] ?></td>
                                <td><?= $qty ?></td>
                                <td>৳<?= $subtotal ?></td>
                                <td>
                                    <form method="post" action="../controller/orderController.php">
                                        <input type="hidden" name="pizza_id" value="<?= $pizzaId ?>">
                                        <button name="remove_item" class="delete-btn">🗑</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>


                </table>
            </div>

            <?php $grandTotal = $total + $deliveryFee; ?>

            <!-- RIGHT: ORDER SUMMARY -->
            <div class="summary-card">
                <h2 class="summary-title">Order Summary</h2>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>৳<?= number_format($total, 2) ?></span>
                </div>

                <div class="summary-row">
                    <span>Delivery Fee</span>
                    <span>৳<?= number_format($deliveryFee, 2) ?></span>
                </div>

                <div class="summary-line"></div>

                <div class="summary-total">
                    <span>Total</span>
                    <span>৳<?= number_format($grandTotal, 2) ?></span>
                </div>

                <form method="post" action="../controller/orderController.php">
                    <button name="place_order" class="place-btn"
                        <?= empty($_SESSION['cart']) ? 'disabled' : '' ?>>
                        Place Order
                    </button>
                </form>
            </div>



        </div>

    </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>