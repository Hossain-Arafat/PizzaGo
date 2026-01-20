<?php
$homeLink = "../index.php";

if (isset($_SESSION['isLoggedIn'])) {

    if ($_SESSION['role'] === 'admin') {
        $homeLink = "../view/dashboard.php";

    } elseif ($_SESSION['role'] === 'staff') {
        $homeLink = "../view/assigned.php";

    } elseif ($_SESSION['role'] === 'customer') {
        $homeLink = "../view/menu.php";
    }
}
?>

<div class="header">
    <a href="<?= $homeLink ?>" class="header-brand">
        <img src="../image/logo.png" class="header-logo-img" alt="PizzaGo Logo">
        <span class="header-logo-text">PizzaGo</span>
    </a>
</div>
