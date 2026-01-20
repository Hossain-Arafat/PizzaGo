<!DOCTYPE html>
<html>

<head>
    <title>PizzaGo|Forget Password</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/forget.css">
</head>

<body>

    <?php include "header.php"; ?>

    <div class="main">
        <div class="card">
            <h2>Forgot Password</h2>

            <form action="../controller/forgetPassController.php" method="post" novalidate>
                <label>Email</label>
                <input type="email" id="email" name="email" 
                placeholder="Enter your email" style="width: 100%; 
                padding: 10px; border: 1px solid #cfd6e1; border-radius: 5px; 
                font-size: 13px; outline: none; box-sizing: border-box;">

                <label style="margin-top: 15px;">New Password </span></label>
                <input type="password" id="password" name="password" 
                placeholder="Enter new password" style="width: 100%; 
                padding: 10px; border: 1px solid #cfd6e1; border-radius: 5px; 
                font-size: 13px; outline: none; box-sizing: border-box;">

                <input class="btn" type="submit" value="Submit">
            </form>

            <p class="back">
                <a href="login.php">Back to Login</a>
            </p>

        </div>
    </div>

    <?php include "footer.php"; ?>
    <script src="../js/forget.js"></script>
    
</body>
</html>