<div class="navbar">
    <div class="nav-right">
        <a href="userDashboard.php" class="<?php if($activePage == 'home') echo 'active'; ?>">Home</a>
        <a href="menu.php" class="<?php if($activePage == 'menu') echo 'active'; ?>">Menu</a>
        <a href="cart.php" class="<?php if($activePage == 'cart') echo 'active'; ?>">Cart</a>
        <a href="orders.php" class="<?php if($activePage == 'orders') echo 'active'; ?>">Orders</a>
        <a href="profile.php" class="<?php if($activePage == 'profile') echo 'active'; ?>">Profile</a>
        <a href="../controller/logoutController.php">Logout</a>
    </div>
</div>
