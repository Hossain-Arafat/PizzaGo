<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Staff - PizzaGo</title>
    <link rel="stylesheet" href="./css/staff.css">
</head>
<body>

<div class="sidebar">
    

    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="manage_pizzas.php">Manage Pizzas</a></li>
        <li><a href="orders_sales.php">Orders & Sales</a></li>
        <li class="active"><a href="staff.php">Manage Staff</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="main">
    <div class="header">
        <h1>Manage Staff Accounts</h1>
        <a href="add_staff.php" class="btn">Add Staff</a>
    </div>

    <div class="box">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Michael Chen</td>
                    <td>michael@pizzago.com</td>
                </tr>
                <tr>
                    <td>Sarah Johnson</td>
                    <td>sarah@pizzago.com</td>
                </tr>
                <tr>
                    <td>David Lee</td>
                    <td>david@pizzago.com</td>
                </tr>
                <tr>
                    <td>Emma Wilson</td>
                    <td>emma@pizzago.com</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
