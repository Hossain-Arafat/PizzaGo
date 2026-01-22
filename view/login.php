<!DOCTYPE html>
<html>

<head>
    <title>PizzaGo|Login</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

<?php include "header.php"; ?>

    <div class="login-box">

        <h3>Login to PizzaGo</h3><br>

        <form id="loginForm" onsubmit="sendLogin(); return false;" novalidate>
            <label>Email</label><br>
            <input type="email" id="email" name="email" placeholder="Enter your email"><br><br>

            <label>Password</label><br>
            <input type="password" id="password" name="password" placeholder="Enter your password"><br><br>

            <input type="submit" value="Login">
        </form>
        <div id="msg" class="msg"></div>
        <p class="link">
        <a href="forget.php">Forgot Password?</a>
        </p>
        <p class="link">Don't have an account?
        <a href="signup.php">Register</a>
        </p>

    </div>

<?php include "footer.php"; ?>
<script src="../js/login.js"></script>

</body>
</html>
