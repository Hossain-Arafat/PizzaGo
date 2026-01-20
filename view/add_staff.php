<?php
$activePage = "staff";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Staff - PizzaGo</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/add_staff.css">
</head>

<body>

<?php include "header.php"; ?>

<div class="dashboard-layout">
    <?php require "sidebar.php"; ?>

    <div class="main">
        <h1>Add Staff Member</h1>

        <div class="form-box">
            <form action="../controller/addStaffController.php" method="post" novalidate>
                <label>Name *</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">

                <label>Email *</label>
                <input type="email" id="email" name="email" placeholder="Enter email address">

                <label>Temporary Password *</label>
                <input type="password" id="password" name="password" placeholder="Enter a temporary password">

                <input type="hidden" name="role" value="staff">

                <div class="buttons">
                    <button type="submit" class="primary">Create Staff Account</button>
                    <a href="staff.php" class="cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
<script src="../js/add_staff.js"></script>
</body>
</html>
