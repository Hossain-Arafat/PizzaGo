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
            <form method="post" novalidate>
                <label>Full Name *</label>
                <input type="text" name="full_name" placeholder="Enter full name">

                <label>Email *</label>
                <input type="email" name="email" placeholder="Enter email address">

                <label>Temporary Password *</label>
                <input type="password" name="temp_password" placeholder="Enter temporary password">

                <div class="buttons">
                    <button type="submit" class="primary">Create Staff Account</button>
                    <a href="staff.php" class="cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
