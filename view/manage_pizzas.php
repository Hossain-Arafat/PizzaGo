<?php
$activePage = "manage_pizzas";  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Pizzas - PizzaGo</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/manage_pizzas.css">
</head>

<body>

    <?php include "header.php"; ?>

    <div class="dashboard-layout">
        <?php require "sidebar.php"; ?>

        <div class="main">
            <div class="page-header">
                <h1>Manage Pizza Menu</h1>
                <a href="add_pizza.php" class="btn">Add New Pizza</a>
            </div>

            <div class="box">
                <table>
                    <thead>
                        <tr>
                            <th>Pizza Name</th>
                            <th>Price</th>
                            <th>Availability Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Margherita</td>
                            <td>$12.99</td>
                            <td><span class="status in">In Stock</span></td>
                            <td class="actions">
                                <a class="icon-btn" href="edit_pizza.php" title="Edit">✏️</a>
                                <a class="icon-btn" href="#" title="Delete">🗑️</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Pepperoni</td>
                            <td>$14.99</td>
                            <td><span class="status in">In Stock</span></td>
                            <td class="actions">
                                <a class="icon-btn" href="edit_pizza.php" title="Edit">✏️</a>
                                <a class="icon-btn" href="#" title="Delete">🗑️</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Vegetarian</td>
                            <td>$13.99</td>
                            <td><span class="status in">In Stock</span></td>
                            <td class="actions">
                                <a class="icon-btn" href="edit_pizza.php" title="Edit">✏️</a>
                                <a class="icon-btn" href="#" title="Delete">🗑️</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Hawaiian</td>
                            <td>$15.99</td>
                            <td><span class="status out">Out of Stock</span></td>
                            <td class="actions">
                                <a class="icon-btn" href="edit_pizza.php" title="Edit">✏️</a>
                                <a class="icon-btn" href="#" title="Delete">🗑️</a>
                            </td>
                        </tr>

                        <tr>
                            <td>BBQ Chicken</td>
                            <td>$16.99</td>
                            <td><span class="status in">In Stock</span></td>
                            <td class="actions">
                                <a class="icon-btn" href="edit_pizza.php" title="Edit">✏️</a>
                                <a class="icon-btn" href="#" title="Delete">🗑️</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
