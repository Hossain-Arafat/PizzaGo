<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Pizza - PizzaGo</title>
    <link rel="stylesheet" href="./css/add_pizza.css">
</head>
<body>

<div class="page">

    <div class="content">
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
            <h1>Add New Pizza</h1>

            <div class="box">
                <form novalidate>
                    <label>Pizza Name *</label>
                    <input type="text" placeholder="Enter pizza name">

                    <label>Description *</label>
                    <textarea placeholder="Enter description"></textarea>

                    <label>Price *</label>
                    <input type="text" placeholder="Enter price">

                    <label>Availability *</label>
                    <select>
                        <option>In Stock</option>
                        <option>Out of Stock</option>
                    </select>

                    <div class="buttons">
                        <button class="primary">Save Pizza</button>
                        <a href="manage_pizzas.php" class="cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


</body>
</html>
