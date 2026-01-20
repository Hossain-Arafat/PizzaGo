<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PizzaGo Register</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="box">
    <h3>Create Account</h3><br>

    <form action="../controller/signupController.php" method="post" novalidate>
        <label for="name">Name *</label><br>
        <input type="text" id="name" name="name" ><br><br>

        <label for="email">Email *</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="password">Password *</label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="hidden" name="role" value="customer">
        <input type="submit" value="Register">
    </form>

    <br>

    <p class="link">
        Already have an account? <a href="login.php">Login</a>
    </p>
    
</div>

<?php include "footer.php"; ?>
<script src="../js/signup.js"></script>
</body>
</html>
