<?php
$activePage = "pizzas";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pizza - PizzaGo</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/edit_pizza.css">
</head>

<body>

<?php include "header.php"; ?>

<div class="dashboard-layout">
    <?php require "sidebar.php"; ?>

    <div class="main">
        <h1>Edit Pizza</h1>

        <div class="form-box">
            <form method="post" novalidate>
                <label>Pizza Name *</label>
                <input type="text" name="pizza_name" placeholder="Enter pizza name">

                <label>Description *</label>
                <textarea name="description" placeholder="Enter description"></textarea>

                <label>Price *</label>
                <input type="text" name="price" placeholder="Enter price">

                <label>Availability *</label>
                <select name="availability">
                    <option value="in">In Stock</option>
                    <option value="out">Out of Stock</option>
                </select>

                <div class="buttons">
                    <button type="submit" class="primary">Update Pizza</button>

                    <!-- no action yet, DB later -->
                    <button type="button" class="danger">Delete Pizza</button>

                    <a href="manage_pizzas.php" class="cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
