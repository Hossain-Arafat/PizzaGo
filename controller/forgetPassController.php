<?php
session_start();
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("location: ../view/forget.php");
    exit();
}

$email = trim($_POST['email'] ?? "");
$password = trim($_POST['password'] ?? "");

if ($email === "" || $password === "") {
    echo "Email and New Password are required.";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

if (!preg_match('/^[A-Za-z0-9]{6,}$/', $password)) {
    echo "Password must be alphanumeric and at least 6 characters (e.g., Abc123).";
    exit();
}

$status = updatePassword($email, $password);

if ($status) {
    header("location: ../view/login.php");
    exit();
} else {
    echo "Password update failed.";
    exit();
}
