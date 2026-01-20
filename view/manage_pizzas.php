<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
$activePage = "manage_pizzas";
require_once "../model/pizza.php";
$pizzas = getAllPizzas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PizzaGo|Manage Pizzas</title>
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
                <?php if(!empty($pizzas)) : ?>
                    <?php foreach($pizzas as $pizza) : ?>
                        <?php
                            $isInStock = ($pizza['availability'] === 'in_stock');
                            $statusClass = $isInStock ? "in" : "out";
                            $statusText = $isInStock ? "In Stock" : "Out of Stock";
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($pizza['name']) ?></td>
                            <td>৳<?= htmlspecialchars($pizza['price']) ?></td>
                            <td><span class="status <?= $statusClass ?>"><?= $statusText ?></span></td>
                            <td class="actions">
                                
                                <a class="icon-btn" href="edit_pizza.php?id=<?= $pizza['id'] ?>" title="Edit">✏️</a>

                                <form action="../controller/deletePizzaController.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $pizza['id'] ?>">
                                    <button type="submit" class="icon-btn" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this pizza?');">
                                        🗑️
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" style="text-align:center; padding: 18px;">
                            No pizzas found. Click <b>Add New Pizza</b> to insert.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
