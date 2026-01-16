<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Staff - PizzaGo</title>
    <link rel="stylesheet" href="./css/add_staff.css">
</head>
<body>

<div class="page">

    <div class="content">
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
            <h1>Add Staff Member</h1>

            <div class="box">
                <form novalidate>
                    <label>Full Name *</label>
                    <input type="text" placeholder="Enter full name">

                    <label>Email *</label>
                    <input type="email" placeholder="Enter email address">

                    <label>Temporary Password *</label>
                    <input type="password" placeholder="Enter temporary password">

                    <div class="buttons">
                        <button class="primary">Create Staff Account</button>
                        <a href="staff.php" class="cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>


</body>
</html>
