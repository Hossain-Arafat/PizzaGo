<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="../PizzaGo/image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../PizzaGo/css/home.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #ffffff;
            color: #111;
            padding-bottom: 70px;
        }
    </style>
</head>

<body>

    <div class="header" style="position: relative;z-index: 5;background: #fff;
                padding: 12px 18px; border-bottom: 1px solid #ccc;">
        <img src="../PizzaGo/image/logo.png" class="header-logo-img" alt="PizzaGo Logo"
            style="width: 75px;height: auto;vertical-align: middle;">
        <span class="header-logo-text" style="font-size: 22px; font-weight: bold;
                    color: blue; vertical-align: middle; margin-left: 6px;">PizzaGo</span>
    </div>

    <!-- HERO / BANNER -->
    <section class="hero">
        <div class="hero-content">
            <h1>Order Your Favorite Pizza Online</h1>
            <p>Fresh ingredients, hot delivery, unbeatable taste!</p>
            <a href="../PizzaGo/view/login.php" class="hero-btn">Order Now</a>
        </div>
    </section>

    <!-- FEATURED PIZZAS -->
    <section class="featured">
        <h2>Featured Pizzas</h2>

        <div class="pizza-grid">

            <div class="pizza-card">
                <div class="menu-img-wrap">
                    <img src="../PizzaGo/image/Margherita.jpg" alt="Margherita" class="menu-img">
                </div>
                <h3>Margherita</h3>
                <p>Classic tomato and mozzarella</p>
            </div>

            <div class="pizza-card">
                <div class="menu-img-wrap">
                    <img src="../PizzaGo/image/Pepperoni.jpg" alt="Pepperoni" class="menu-img">
                </div>
                <h3>Pepperoni</h3>
                <p>Spicy pepperoni with cheese</p>
            </div>

            <div class="pizza-card">
                <div class="menu-img-wrap">
                    <img src="../PizzaGo/image/Chicken Dominator.jpg" alt="Chicken Dominator" class="menu-img">
                </div>
                <h3>Chicken Dominator</h3>
                <p>Four mouthwatering chicken toppings</p>
            </div>
        </div>
    </section>

    <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;
    background: #fff;border-top: 1px solid #ddd;text-align: center;
    font-size: 12px;color: #666;padding: 14px 10px;">
        © 2026 PizzaGo. All rights reserved.
    </div>


</body>

</html>