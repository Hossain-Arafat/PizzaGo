
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password - PizzaGo</title>
    <link rel="stylesheet" href="../css/change_password.css">
</head>
<body>

<h1>Change Password</h1>

<div class="box">
    

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
