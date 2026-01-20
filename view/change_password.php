<?php
session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: login.php");
    exit();
}
$emailValue = $_SESSION['email'] ?? "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password - PizzaGo</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/change_password.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="page">
    <div class="card">
        <h1 class="title">Change Password</h1>

        <form action="../controller/passwordController.php" method="post" novalidate>
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($emailValue) ?>" readonly>

            <label>New Password <span class="req">*</span></label>
            <input type="password" name="password" placeholder="Enter new password">

            <div class="buttons">
                <button type="submit" class="primary">Save Changes</button>
                <a href="profile.php" class="cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>
<script src="../js/change_password.js"></script>
</body>
</html>
