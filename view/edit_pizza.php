<?php
$name = "Margherita";
$description = "Classic tomato and mozzarella";
$price = "12.99";
$availability = "In Stock";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pizza - PizzaGo</title>
    <link rel="stylesheet" href="./css/edit_pizza.css">
</head>
<body>

<div class="sidebar">
    
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active"><a href="manage_pizzas.php">Manage Pizzas</a></li>
        <li><a href="orders_sales.php">Orders & Sales</a></li>
        <li><a href="staff.php">Manage Staff</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="main">
    <h1>Edit Pizza</h1>

    <div class="box">
        <form method="post" novalidate>
            <label>Pizza Name *</label>
            <input type="text" value="<?php echo $name; ?>">

            <label>Description *</label>
            <textarea><?php echo $description; ?></textarea>

            <label>Price *</label>
            <input type="text" value="<?php echo $price; ?>">

            <label>Availability *</label>
            <select>
                <option <?php if ($availability === "In Stock") echo "selected"; ?>>In Stock</option>
                <option <?php if ($availability === "Out of Stock") echo "selected"; ?>>Out of Stock</option>
            </select>

            <div class="buttons">
                <button type="submit" class="primary">Update Pizza</button>
                <button type="button" class="danger" onclick="confirmDelete()">Delete Pizza</button>
                <a href="manage_pizzas.php" class="cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
function confirmDelete() {
    if (confirm("Are you sure you want to delete this pizza?")) {
        window.location.href = "manage_pizzas.php";
    }
}
</script>



</body>
</html>
