<?php
session_start();
require_once "../model/user.php";

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../view/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("location: ../view/change_password.php");
    exit();
}

$password = trim($_POST['password'] ?? "");

// Required
if ($password === "") {
    echo "New password is required.";
    exit();
}

// Password: alphanumeric + minimum 6
if (!preg_match('/^[A-Za-z0-9]{6,}$/', $password)) {
    echo "Password must be alphanumeric and at least 6 characters (e.g., Abc123).";
    exit();
}

// Identify by session email (trusted)
$email = $_SESSION['email'] ?? "";
if ($email === "") {
    header("location: ../view/login.php");
    exit();
}

$status = updatePassword($email, $password);

if ($status) {
    header("location: ../view/profile.php");
    exit();
} else {
    echo "Password update failed.";
    exit();
}
