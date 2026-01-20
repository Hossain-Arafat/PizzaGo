<?php
session_start();
require_once "../model/user.php";

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../view/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("location: ../view/profile.php");
    exit();
}

$name  = trim($_POST['name'] ?? "");
$email = trim($_POST['email'] ?? "");

if ($name === "" || $email === "") {
    echo "Name and Email are required.";
    exit();
}

if (strlen($name) < 2) {
    echo "Name must be at least 2 characters.";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

$currentEmail = $_SESSION['email'] ?? "";
if ($currentEmail === "") {
    header("location: ../view/login.php");
    exit();
}

$status = updateProfile($currentEmail, $name, $email);

if ($status) {
    $_SESSION['name']  = $name;
    $_SESSION['email'] = $email;
}

header("location: ../view/profile.php");
exit();
