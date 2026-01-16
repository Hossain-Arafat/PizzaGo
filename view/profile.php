<?php
$activePage = "profile";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile - PizzaGo</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">

    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>

    <?php include "header.php" ?>

    <div class="main">
        <h1>My Profile</h1>

        <div class="box">
            <h3>Profile Details</h3>

            <form method="post" novalidate>
                <label>Name *</label>
                <input type="text" name="name">

                <label>Email *</label>
                <input type="email" name="email">

                <div class="buttons">
                    <button type="submit" class="primary">Update Profile</button>
                    <a href="change_password.php" class="secondary">Change Password</a>
                    <a href="../controller/logoutController.php" class="danger">Logout</a>
                </div>
            </form>
        </div>
    </div>
    <?php include "footer.php" ?>


</body>

</html>