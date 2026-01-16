<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details - PizzaGo</title>
    <link rel="stylesheet" href="./css/order_details.css">
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

    <div class="top">
        <div class="card">
            <h3>Order Summary</h3>
            <div class="row"><span>Order ID:</span><span>#12345</span></div>
            <div class="row"><span>Order Date:</span><span>Jan 14, 2026</span></div>
            <div class="row"><span>Order Time:</span><span>2:30 PM</span></div>
            <div class="row">
                <span>Status:</span>
                <span class="status">Preparing</span>
            </div>
        </div>

        <div class="card">
            <h3>Customer Information</h3>
            <div class="row"><span>Name:</span><span>John Doe</span></div>
            <div class="row"><span>Email:</span><span>john.doe@email.com</span></div>
            <div class="row"><span>Phone:</span><span>+1 234 567 8900</span></div>
        </div>
    </div>

    <div class="card">
        <h3>Ordered Items</h3>

        <div class="item">
            <div>
                <strong>Margherita</strong>
                <p>Quantity: 2</p>
            </div>
            <span>$25.98</span>
        </div>

        <div class="item">
            <div>
                <strong>Pepperoni</strong>
                <p>Quantity: 1</p>
            </div>
            <span>$14.99</span>
        </div>

        <div class="summary">
            <div><span>Subtotal:</span><span>$40.97</span></div>
            <div><span>Tax (10%):</span><span>$4.10</span></div>
            <div class="total"><span>Total:</span><span>$45.07</span></div>
        </div>
    </div>

</div>


</body>
</html>
