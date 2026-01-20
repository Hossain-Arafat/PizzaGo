<?php
$activePage = "manage_pizzas";
require_once "../model/pizza.php";

$id = $_GET['id'] ?? '';
if($id === '' || !is_numeric($id)){
    header("location: manage_pizzas.php");
    exit();
}

$pizza = getPizzaById((int)$id);
if(!$pizza){
    header("location: manage_pizzas.php");
    exit();
}
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
            
            <form action="../controller/updatePizzaController.php" method="post" novalidate>

                <input type="hidden" name="id" value="<?= htmlspecialchars($pizza['id']) ?>">

                <label>Pizza Name *</label>
                <input type="text" name="pizza_name" value="<?= htmlspecialchars($pizza['name']) ?>" placeholder="Enter pizza name">

                <label>Description *</label>
                <textarea name="description" placeholder="Enter description"><?= htmlspecialchars($pizza['description']) ?></textarea>

                <label>Price *</label>
                <input type="text" name="price" value="<?= htmlspecialchars($pizza['price']) ?>" placeholder="Enter price">

                <label>Availability *</label>
                <select name="availability">
                    <option value="in_stock" <?= ($pizza['availability'] === 'in_stock') ? 'selected' : '' ?>>In Stock</option>
                    <option value="out_of_stock" <?= ($pizza['availability'] === 'out_of_stock') ? 'selected' : '' ?>>Out of Stock</option>
                </select>

                <div class="buttons">
                    <button type="submit" class="primary">Update Pizza</button>
                    <a href="manage_pizzas.php" class="cancel">Cancel</a>
                </div>
            </form>

            
            <form action="../controller/deletePizzaController.php" method="post" style="margin-top: 12px;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($pizza['id']) ?>">
                <button type="submit" class="danger" onclick="return confirm('Are you sure you want to delete this pizza?');">
                    Delete Pizza
                </button>
            </form>

        </div>
    </div>
</div>

<?php include "footer.php"; ?>
<script src="../js/edit_pizza.js"></script>
</body>
</html>
