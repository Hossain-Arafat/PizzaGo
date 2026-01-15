<?php
session_start();
$activePage = 'cart';
// If cart not created, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// ADD TO CART (from menu.php)
if (isset($_POST['add_to_cart'])) {
    $name = $_POST['pizza_name'];
    $price = floatval($_POST['pizza_price']);
    $qty = intval($_POST['pizza_qty']);

    // If already exists, increase qty
    if (isset($_SESSION['cart'][$name])) {
        $_SESSION['cart'][$name]['qty'] += $qty;
    } else {
        $_SESSION['cart'][$name] = [
            'price' => $price,
            'qty' => $qty
        ];
    }

    // Stop resubmission on refresh
    header("Location: cart.php");
    exit();
}

// UPDATE QTY (+/- buttons in cart.php)
if (isset($_POST['update_qty'])) {
    $name = $_POST['item_name'];
    $newQty = intval($_POST['new_qty']);

    if ($newQty < 1) $newQty = 1;

    if (isset($_SESSION['cart'][$name])) {
        $_SESSION['cart'][$name]['qty'] = $newQty;
    }

    header("Location: cart.php");
    exit();
}

// REMOVE ITEM
if (isset($_POST['remove_item'])) {
    $name = $_POST['item_name'];

    if (isset($_SESSION['cart'][$name])) {
        unset($_SESSION['cart'][$name]);
    }

    header("Location: cart.php");
    exit();
}

// PLACE ORDER
if (isset($_POST['place_order'])) {

    // If cart empty, just go to cart page
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        header("Location: cart.php");
        exit();
    }

    // Calculate totals (same as cart summary)
    $subtotalSum = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotalSum += $item['price'] * $item['qty'];
    }
    $tax = $subtotalSum * 0.10;
    $total = $subtotalSum + $tax;

    // Create orders array if not exist
    if (!isset($_SESSION['orders'])) {
        $_SESSION['orders'] = [];
    }

    // Fake order id (simple)
    $orderId = rand(10000, 99999);

    // Save order
    $_SESSION['orders'][] = [
        'id' => $orderId,
        'date' => date("M j, Y"),   // e.g. Jan 15, 2026
        'total' => $total,
        'status' => 'Preparing'
    ];

    // Clear cart after placing order
    $_SESSION['cart'] = [];

    // Redirect to orders page
    header("Location: orders.php");
    exit();
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
                        <?php if (empty($_SESSION['cart'])) { ?>
                            <tr>
                                <td colspan="5" style="padding:20px;">Your cart is empty.</td>
                            </tr>
                        <?php } else { ?>

                            <?php foreach ($_SESSION['cart'] as $name => $item) {
                                $price = $item['price'];
                                $qty = $item['qty'];
                                $subtotal = $price * $qty;
                            ?>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td>$<?php echo number_format($price, 2); ?></td>

                                    <td>
                                        <div class="qty-box">

                                            <!-- Minus -->
                                            <form method="post" action="cart.php" style="display:inline;">
                                                <input type="hidden" name="item_name" value="<?php echo $name; ?>">
                                                <input type="hidden" name="new_qty" value="<?php echo $qty - 1; ?>">
                                                <button type="submit" name="update_qty" class="qty-btn">−</button>
                                            </form>

                                            <span class="qty-value"><?php echo $qty; ?></span>

                                            <!-- Plus -->
                                            <form method="post" action="cart.php" style="display:inline;">
                                                <input type="hidden" name="item_name" value="<?php echo $name; ?>">
                                                <input type="hidden" name="new_qty" value="<?php echo $qty + 1; ?>">
                                                <button type="submit" name="update_qty" class="qty-btn">+</button>
                                            </form>

                                        </div>
                                    </td>

                                    <td>$<?php echo number_format($subtotal, 2); ?></td>

                                    <td>
                                        <form method="post" action="cart.php">
                                            <input type="hidden" name="item_name" value="<?php echo $name; ?>">
                                            <button type="submit" name="remove_item" class="delete-btn" title="Remove">🗑</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>

                        <?php } ?>
                    </tbody>

                </table>
            </div>
            <?php
            $subtotalSum = 0;

            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $subtotalSum += $item['price'] * $item['qty'];
                }
            }

            $tax = $subtotalSum * 0.10;
            $total = $subtotalSum + $tax;
            ?>

            <!-- RIGHT: ORDER SUMMARY -->
            <div class="summary-card">
                <h2 class="summary-title">Order Summary</h2>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>$<?php echo number_format($subtotalSum, 2); ?></span>
                </div>

                <div class="summary-row">
                    <span>Tax (10%)</span>
                    <span>$<?php echo number_format($tax, 2); ?></span>
                </div>

                <div class="summary-line"></div>

                <div class="summary-total">
                    <span>Total</span>
                    <span>$<?php echo number_format($total, 2); ?></span>
                </div>

                <form method="post" action="cart.php">
                    <button type="submit" name="place_order" class="place-btn">Place Order</button>
                </form>

            </div>

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="../js/cart.js"></script>
</body>

</html>