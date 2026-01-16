<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/forget.css">
</head>
<body>

 <?php include "header.php"; ?>

    <div class="main">
        <div class="card">
            <h2>Forgot Password</h2>

            <form novalidate>
    <label>Email <span class="req">*</span></label>
    <input type="email" placeholder="Enter your email" style="width: 100%; padding: 10px; border: 1px solid #cfd6e1; border-radius: 5px; font-size: 13px; outline: none; box-sizing: border-box;">

    <label style="margin-top: 15px;">New Password <span class="req">*</span></label>
    <input type="password" placeholder="Enter new password" style="width: 100%; padding: 10px; border: 1px solid #cfd6e1; border-radius: 5px; font-size: 13px; outline: none; box-sizing: border-box;">

    <input class="btn" type="submit" value="Submit">
</form>

            <p class="back">
                <a href="login.php">Back to Login</a>
            </p>
        </div>
    </div>

<?php include "footer.php"; ?>

</body>
</html>