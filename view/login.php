<!DOCTYPE html>
<html>
<head>
    <title>PizzaGo Login</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

<?php include "header.php"; ?>

    <div class="login-box">

        <h3>Login to PizzaGo</h3>

        <form action="assigned.php" novalidate>
            <label>Email *</label><br>
            <input type="email" required><br><br>

            <label>Password *</label><br>
            <input type="password" required><br><br>

            <input type="submit" value="Login">
        </form>

        <p class="link">
        <a href="forget.php">Forgot Password?</a>
        </p>

        <p class="link">
        Don't have an account?
        <a href="signup.php">Register</a>
        </p>

   

    </div>

<?php include "footer.php"; ?>

</body>
</html>
