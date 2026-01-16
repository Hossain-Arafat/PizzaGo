<?php
$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $current = trim($_POST["current"]);
    $new = trim($_POST["new"]);
    $confirm = trim($_POST["confirm"]);

    if ($current === "" || $new === "" || $confirm === "") {
        $error = "All fields are required.";
    } elseif ($new !== $confirm) {
        $error = "New password and confirm password must match.";
    } else {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password - PizzaGo</title>
    <link rel="stylesheet" href="./css/change_password.css">
</head>
<body>

<h1>Change Password</h1>

<div class="box">
    <?php if ($success) { ?>
        <div class="success">Password updated successfully!</div>
    <?php } ?>

    <?php if ($error) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="post" novalidate>
        <label>Current Password *</label>
        <input type="password" name="current" placeholder="Enter current password">

        <label>New Password *</label>
        <input type="password" name="new" placeholder="Enter new password">

        <label>Confirm New Password *</label>
        <input type="password" name="confirm" placeholder="Confirm new password">

        <div class="buttons">
            <button type="submit" class="primary">Save Changes</button>
            <a href="profile.php" class="cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
