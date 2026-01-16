<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
	header("Location: login.php");
	exit();
}
$activePage = 'menu';
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

            <!-- Card 1 -->
            <div class="menu-card">
                <div class="menu-img">
                    <span>Pizza Image</span>
                </div>

                <div class="menu-top">
                    <h3>Margherita</h3>
                    <span class="stock in">In Stock</span>
                </div>

                <p class="menu-desc">Classic tomato and mozzarella</p>
                <div class="menu-price">$12.99</div>

                <div class="qty-row">
                    <span class="qty-label">Quantity:</span>

                    <div class="qty-box">
                        <button type="button" class="qty-btn qty-minus">−</button>
                        <input type="text" class="qty-value" value="1" readonly>
                        <button type="button" class="qty-btn qty-plus">+</button>
                    </div>
                </div>

                <form method="post" action="cart.php" class="add-form">
                    <input type="hidden" name="pizza_name" value="Margherita">
                    <input type="hidden" name="pizza_price" value="12.99">
                    <input type="hidden" name="pizza_qty" class="qty-hidden" value="1">

                    <button class="add-btn" type="submit" name="add_to_cart">Add to Cart</button>
                </form>


            </div>

            <!-- Card 2 -->
            <div class="menu-card">
                <div class="menu-img">
                    <span>Pizza Image</span>
                </div>

                <div class="menu-top">
                    <h3>Pepperoni</h3>
                    <span class="stock in">In Stock</span>
                </div>

                <p class="menu-desc">Spicy pepperoni with cheese</p>
                <div class="menu-price">$14.99</div>

                <div class="qty-row">
                    <span class="qty-label">Quantity:</span>

                    <div class="qty-box">
                        <button type="button" class="qty-btn qty-minus">−</button>
                        <input type="text" class="qty-value" value="1" readonly>
                        <button type="button" class="qty-btn qty-plus">+</button>
                    </div>
                </div>

                <form method="post" action="cart.php" class="add-form">
                    <input type="hidden" name="pizza_name" value="Pepperoni">
                    <input type="hidden" name="pizza_price" value="14.99">
                    <input type="hidden" name="pizza_qty" class="qty-hidden" value="1">

                    <button class="add-btn" type="submit" name="add_to_cart">Add to Cart</button>
                </form>


            </div>

            <!-- Card 3 -->
            <div class="menu-card">
                <div class="menu-img">
                    <span>Pizza Image</span>
                </div>

                <div class="menu-top">
                    <h3>Vegetarian</h3>
                    <span class="stock in">In Stock</span>
                </div>

                <p class="menu-desc">Fresh vegetables and herbs</p>
                <div class="menu-price">$13.99</div>

                <div class="qty-row">
                    <span class="qty-label">Quantity:</span>

                    <div class="qty-box">
                        <button type="button" class="qty-btn qty-minus">−</button>
                        <input type="text" class="qty-value" value="1" readonly>
                        <button type="button" class="qty-btn qty-plus">+</button>
                    </div>
                </div>

                <form method="post" action="cart.php" class="add-form">
                    <input type="hidden" name="pizza_name" value="Vegetarian">
                    <input type="hidden" name="pizza_price" value="13.99">
                    <input type="hidden" name="pizza_qty" class="qty-hidden" value="1">

                    <button class="add-btn" type="submit" name="add_to_cart">Add to Cart</button>
                </form>


            </div>

            <!-- Card 4 -->
            <div class="menu-card">
                <div class="menu-img">
                    <span>Pizza Image</span>
                </div>

                <div class="menu-top">
                    <h3>Hawaiian</h3>
                    <span class="stock in">In Stock</span>
                </div>

                <p class="menu-desc">Ham and pineapple</p>
                <div class="menu-price">$15.99</div>

                <div class="qty-row">
                    <span class="qty-label">Quantity:</span>

                    <div class="qty-box">
                        <button type="button" class="qty-btn qty-minus">−</button>
                        <input type="text" class="qty-value" value="1" readonly>
                        <button type="button" class="qty-btn qty-plus">+</button>
                    </div>
                </div>

                <form method="post" action="cart.php" class="add-form">
                    <input type="hidden" name="pizza_name" value="Hawaiian">
                    <input type="hidden" name="pizza_price" value="15.99">
                    <input type="hidden" name="pizza_qty" class="qty-hidden" value="1">

                    <button class="add-btn" type="submit" name="add_to_cart">Add to Cart</button>
                </form>


            </div>

            <!-- Card 5 (Out of Stock) -->
            <div class="menu-card">
                <div class="menu-img">
                    <span>Pizza Image</span>
                </div>

                <div class="menu-top">
                    <h3>BBQ Chicken</h3>
                    <span class="stock in">In Stock</span>
                </div>

                <p class="menu-desc">Grilled chicken with BBQ sauce</p>
                <div class="menu-price">$16.99</div>

                <div class="qty-row">
                    <span class="qty-label">Quantity:</span>

                    <div class="qty-box">
                        <button type="button" class="qty-btn qty-minus">−</button>
                        <input type="text" class="qty-value" value="1" readonly>
                        <button type="button" class="qty-btn qty-plus">+</button>
                    </div>
                </div>

                <form method="post" action="cart.php" class="add-form">
                    <input type="hidden" name="pizza_name" value="BBQ Chicken">
                    <input type="hidden" name="pizza_price" value="16.99">
                    <input type="hidden" name="pizza_qty" class="qty-hidden" value="1">

                    <button class="add-btn" type="submit" name="add_to_cart">Add to Cart</button>
                </form>


            </div>

            <!-- Card 6 -->
            <div class="menu-card">
                <div class="menu-img">
                    <span>Pizza Image</span>
                </div>

                <div class="menu-top">
                    <h3>Four Cheese</h3>
                    <span class="stock in">In Stock</span>
                </div>

                <p class="menu-desc">Mozzarella, cheddar, parmesan, gorgonzola</p>
                <div class="menu-price">$17.99</div>

                <div class="qty-row">
                    <span class="qty-label">Quantity:</span>

                    <div class="qty-box">
                        <button type="button" class="qty-btn qty-minus">−</button>
                        <input type="text" class="qty-value" value="1" readonly>
                        <button type="button" class="qty-btn qty-plus">+</button>
                    </div>
                </div>

                <form method="post" action="cart.php" class="add-form">
                    <input type="hidden" name="pizza_name" value="Four Cheese">
                    <input type="hidden" name="pizza_price" value="17.99">
                    <input type="hidden" name="pizza_qty" class="qty-hidden" value="1">

                    <button class="add-btn" type="submit" name="add_to_cart">Add to Cart</button>
                </form>


            </div>

        </div>
    </div>

    <?php include "footer.php"; ?>
    <script src="../js/menu.js"></script>
</body>

</html>