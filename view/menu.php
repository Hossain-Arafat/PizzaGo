<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
$activePage = 'menu';

require_once "../model/pizza.php";
$pizzas = getAvailablePizzasForMenu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body>

    <?php include "header.php"; ?>
    <?php include "navigationBar.php"; ?>

    <div class="menu-wrapper">
        <h1 class="menu-title">Pizza Menu</h1>

        <div class="menu-grid">

            <?php if (!empty($pizzas)) : ?>
                <?php foreach ($pizzas as $pizza) : ?>
                    <?php
                    $isInStock = ($pizza['availability'] === 'in_stock');
                    $stockClass = $isInStock ? "in" : "out";
                    $stockText  = $isInStock ? "In Stock" : "Out of Stock";
                    ?>

                    <div class="menu-card">
                        <div class="menu-img-wrap">
                            <img src="../image/<?= htmlspecialchars($pizza['name']) ?>.jpg" alt="<?= htmlspecialchars($pizza['name']) ?>" class="menu-img">
                        </div>

                        <div class="menu-top">
                            <h3><?= htmlspecialchars($pizza['name']) ?></h3>
                            <span class="stock <?= $stockClass ?>"><?= $stockText ?></span>
                        </div>

                        <p class="menu-desc"><?= htmlspecialchars($pizza['description'] ?? '') ?></p>
                        <div class="menu-price">৳<?= htmlspecialchars($pizza['price']) ?></div>

                        <!-- KEEP cart.php logic same -->
                        <form method="post" action="../controller/orderController.php">
                            <input type="hidden" name="pizza_id" value="<?= $pizza['id'] ?>">
                            <button type="submit" class="add-btn" name="add_to_cart" <?= !$isInStock ? 'disabled' : '' ?>>
                                Add to Cart
                            </button>

                        </form>

                    </div>

                <?php endforeach; ?>
            <?php else : ?>
                <p style="padding: 16px;">No pizzas found.</p>
            <?php endif; ?>

        </div>

    </div>
    <?php include "footer.php"; ?>
</body>

</html>