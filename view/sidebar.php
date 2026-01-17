<?php
if (!isset($activePage)) {
    $activePage = "";
}
?>

<div class="sidebar">
    <ul>
        <li class="<?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">
            <a href="dashboard.php">Dashboard</a>
        </li>

        <li class="<?php echo ($activePage == 'manage_pizzas') ? 'active' : ''; ?>">
            <a href="manage_pizzas.php">Manage Pizzas</a>
        </li>

        <li class="<?php echo ($activePage == 'staff') ? 'active' : ''; ?>">
            <a href="staff.php">Manage Staff</a>
        </li>

        <li class="<?php echo ($activePage == 'profile') ? 'active' : ''; ?>">
            <a href="profile.php">Profile</a>
        </li>

        <li class="<?php echo ($activePage == 'logout') ? 'active' : ''; ?>">
            <a href="../controller/logoutController.php">Logout</a>
        </li>
    </ul>
</div>
