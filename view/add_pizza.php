<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
$activePage = "manage_pizzas";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PizzaGo|Add Pizza</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/add_pizza.css">
</head>

<body>

<?php include "header.php"; ?>

<div class="dashboard-layout">
    <?php require "sidebar.php"; ?>

    <div class="main">
        <h1>Add New Pizza</h1>

        <div class="box">
            <form action="../controller/addPizzaController.php" method="post" novalidate>
                <label>Pizza Name</label>
                <input type="text" name="pizza_name" placeholder="Enter pizza name">

                <label>Description</label>
                <textarea name="description" placeholder="Enter description"></textarea>

                <label>Price</label>
                <input type="text" name="price" placeholder="Enter price">

                <label>Availability</label>
                <select name="availability">
                    <option value="in_stock">In Stock</option>
                    <option value="out_of_stock">Out of Stock</option>
                </select>

                <div class="buttons">
                    <button type="submit" class="primary">Save Pizza</button>
                    <a href="manage_pizzas.php" class="cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
<script src="../js/add_pizza.js"></script>
</body>
</html>
