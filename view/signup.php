<!DOCTYPE html>
<html>
<head>
    <title>PizzaGo Register</title>
    <link rel="stylesheet" href="../css/common.css">
       <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>

   <?php include "header.php"; ?>

    <div class="box">
        <h3>Create Account</h3>

        <form novalidate>
            <label>Full Name *</label><br>
            <input type="text"><br><br>

            <label>Email *</label><br>
            <input type="email"><br><br>

            <label>Password *</label><br>
            <input type="password"><br><br>

            <label>Confirm Password *</label><br>
            <input type="password"><br><br>

            <label>Role *</label><br>
            <select>
                <option>Select</option>
                <option>Staff</option>
                <option>Customer</option>
            </select><br><br>

            <input type="submit" value="Register">
        </form>

        <p class="link">
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>

<?php include "footer.php"; ?>

</body>
</html>
