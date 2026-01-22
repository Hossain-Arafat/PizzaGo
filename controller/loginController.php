<?php
session_start();
require_once "../model/user.php";

$email = trim($_POST['email'] ?? "");
$password = trim($_POST['password'] ?? "");

if ($email === "" || $password === "") {
    echo "Email and Password are required.";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

if (!preg_match('/^[A-Za-z0-9]{6,}$/', $password)) {
    echo "Password must be at least 6 characters.";
    exit();
}

$user = [
    "email" => $email,
    "password" => $password
];

$status = loginUser($user);

if ($status) {
    $_SESSION['user_id'] = $status['id'];
    $_SESSION['name'] = $status['name'];
    $_SESSION['email'] = $status['email'];
    $_SESSION['role'] = $status['role'];
    $_SESSION['isLoggedIn'] = true;

    if ($status['role'] === "customer") {
        echo "SUCCESS|../view/menu.php";
    } 
    else if ($status['role'] === "admin") {
        echo "SUCCESS|../view/dashboard.php";
    } 
    else if ($status['role'] === "staff") {
        echo "SUCCESS|../view/assigned.php";
    } 
    else {
        echo "Invalid role.";
    }
} 
else {
    echo "Invalid Credentials";
}
