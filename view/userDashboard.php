<?php
$activePage = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/userDashboard.css">
</head>

<body>

    <?php include "header.php"; ?>
    <?php include "navigationBar.php"; ?>

    <!-- HERO / BANNER -->
    <section class="hero">
        <div class="hero-content">
            <h1>Order Your Favorite Pizza Online</h1>
            <p>Fresh ingredients, hot delivery, unbeatable taste!</p>
            <a href="menu.php" class="hero-btn">Order Now</a>
        </div>
    </section>

    <!-- FEATURED PIZZAS -->
    <section class="featured">
        <h2>Featured Pizzas</h2>

        <div class="pizza-grid">

            <div class="pizza-card">
                <div class="pizza-img"><span>Pizza Image</span></div>
                <h3>Margherita</h3>
                <p>Classic tomato and mozzarella</p>
                <div class="pizza-bottom">
                    <div class="price">$12.99</div>
                    <a href="menu.php" class="order-btn">Order</a>
                </div>
            </div>

            <div class="pizza-card">
                <div class="pizza-img"><span>Pizza Image</span></div>
                <h3>Pepperoni</h3>
                <p>Spicy pepperoni with cheese</p>
                <div class="pizza-bottom">
                    <div class="price">$14.99</div>
                    <a href="menu.php" class="order-btn">Order</a>
                </div>
            </div>

            <div class="pizza-card">
                <div class="pizza-img"><span>Pizza Image</span></div>
                <h3>Vegetarian</h3>
                <p>Fresh vegetables and herbs</p>
                <div class="pizza-bottom">
                    <div class="price">$13.99</div>
                    <a href="menu.php" class="order-btn">Order</a>
                </div>
            </div>

        </div>
    </section>

    <?php include "footer.php"; ?>

</body>
</html>
