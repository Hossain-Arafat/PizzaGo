<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders & Sales - PizzaGo</title>
    <link rel="stylesheet" href="./css/orders_sales.css">
</head>
<body>

<div class="sidebar">
    

    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="manage_pizzas.php">Manage Pizzas</a></li>
        <li class="active"><a href="orders_sales.php">Orders & Sales</a></li>
        <li><a href="staff.php">Manage Staff</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="main">
    <h1>Orders & Sales</h1>

    <div class="cards">
        <div class="card">
            <p>Total Revenue</p>
            <h2>$45,678</h2>
        </div>
        <div class="card">
            <p>Number of Orders</p>
            <h2>1,234</h2>
        </div>
        <div class="card">
            <p>Average Order Value</p>
            <h2>$37.02</h2>
        </div>
    </div>

    <div class="box">
        <h3>Recent Orders</h3>

        <table>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <tr>
                <td>#12345</td>
                <td>John Doe</td>
                <td>Jan 14, 2026</td>
                <td>$40.77</td>
                <td><span class="status preparing">Preparing</span></td>
                <td><a href="order_details.php" class="view-btn">View Details</a></td>
            </tr>

            <tr>
                <td>#12344</td>
                <td>Jane Smith</td>
                <td>Jan 14, 2026</td>
                <td>$27.49</td>
                <td><span class="status delivered">Delivered</span></td>
                <td><a href="order_details.php" class="view-btn">View Details</a></td>
            </tr>

            <tr>
                <td>#12343</td>
                <td>Bob Johnson</td>
                <td>Jan 13, 2026</td>
                <td>$45.99</td>
                <td><span class="status ready">Ready</span></td>
                <td><a href="order_details.php" class="view-btn">View Details</a></td>
            </tr>

            <tr>
                <td>#12342</td>
                <td>Alice Brown</td>
                <td>Jan 13, 2026</td>
                <td>$32.89</td>
                <td><span class="status delivered">Delivered</span></td>
                <td><a href="order_details.php" class="view-btn">View Details</a></td>
            </tr>

            <tr>
                <td>#12341</td>
                <td>Charlie Davis</td>
                <td>Jan 12, 2026</td>
                <td>$51.20</td>
                <td><span class="status delivered">Delivered</span></td>
                <td><a href="order_details.php" class="view-btn">View Details</a></td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
