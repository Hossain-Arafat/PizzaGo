<?php
$success = false;
$error = false;

$name = "John Doe";
$email = "john.doe@pizzago.com";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    if ($name === "" || $email === "") {
        $error = true;
    } else {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - PizzaGo</title>
    <link rel="stylesheet" href="./css/profile.css">
</head>
<body>

<div class="sidebar">
    

    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="manage_pizzas.php">Manage Pizzas</a></li>
        <li><a href="orders_sales.php">Orders & Sales</a></li>
        <li><a href="staff.php">Manage Staff</a></li>
        <li class="active"><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="main">
    <h1>My Profile</h1>

    <div class="box">
        <h3>Profile Details</h3>

        <?php if ($success) { ?>
            <div class="success">Profile updated successfully!</div>
        <?php } ?>

        <?php if ($error) { ?>
            <div class="error">All fields are required.</div>
        <?php } ?>

        <form method="post" novalidate>
            <label>Name *</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">

            <label>Email *</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <div class="buttons">
                <button type="submit" class="primary">Update Profile</button>
                <a href="change_password.php" class="secondary">Change Password</a>
                <a href="logout.php" class="danger">Logout</a>
            </div>
        </form>
    </div>
</div>


</body>
</html>
