<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Pizzas - PizzaGo</title>
    <link rel="stylesheet" href="./css/manage_pizzas.css">
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
    <div class="header">
        <h1>Manage Pizza Menu</h1>
        <a href="add_pizza.php" class="btn">Add New Pizza</a>
    </div>

    <div class="box">
        <table>
            <tr>
                <th>Pizza Name</th>
                <th>Price</th>
                <th>Availability Status</th>
                <th>Actions</th>
            </tr>

            <tr>
                <td>Margherita</td>
                <td>$12.99</td>
                <td><span class="status in">In Stock</span></td>
                <td class="actions">
                    <a href="edit_pizza.php">✏️</a>
                    <a href="#" onclick="return confirmDelete()">🗑️</a>
                </td>
            </tr>

            <tr>
                <td>Pepperoni</td>
                <td>$14.99</td>
                <td><span class="status in">In Stock</span></td>
                <td class="actions">
                    <a href="edit_pizza.php">✏️</a>
                    <a href="#" onclick="return confirmDelete()">🗑️</a>
                </td>
            </tr>

            <tr>
                <td>Vegetarian</td>
                <td>$13.99</td>
                <td><span class="status in">In Stock</span></td>
                <td class="actions">
                    <a href="edit_pizza.php">✏️</a>
                    <a href="#" onclick="return confirmDelete()">🗑️</a>
                </td>
            </tr>

            <tr>
                <td>Hawaiian</td>
                <td>$15.99</td>
                <td><span class="status out">Out of Stock</span></td>
                <td class="actions">
                    <a href="edit_pizza.php">✏️</a>
                    <a href="#" onclick="return confirmDelete()">🗑️</a>
                </td>
            </tr>

            <tr>
                <td>BBQ Chicken</td>
                <td>$16.99</td>
                <td><span class="status in">In Stock</span></td>
                <td class="actions">
                    <a href="edit_pizza.php">✏️</a>
                    <a href="#" onclick="return confirmDelete()">🗑️</a>
                </td>
            </tr>
        </table>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this pizza?");
}
</script>


</body>
</html>
