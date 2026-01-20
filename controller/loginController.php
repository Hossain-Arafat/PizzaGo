<?php
session_start();
require_once "../model/user.php";

function loginController()
{
    // 1) Check required fields exist
    if (!isset($_POST['email'], $_POST['password'])) {
        echo "Invalid request.";
        exit();
    }

    // 2) Trim + validate inputs
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === "" || $password === "") {
        echo "Email and Password are required.";
        exit();
    }

    // Email format validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Password rule: alphanumeric + minimum 6 characters
    if (!preg_match('/^[A-Za-z0-9]{6,}$/', $password)) {
        echo "Password must be alphanumeric and at least 6 characters.";
        exit();
    }

    // 3) Attempt login
    $user = [
        "email" => $email,
        "password" => $password
    ];

    $status = loginUser($user);

    if ($status) {
        // Good practice (prevents session fixation)
        session_regenerate_id(true);

        $_SESSION['user_id'] = $status['id'];
        $_SESSION['name'] = $status['name'];
        $_SESSION['email'] = $status['email'];
        $_SESSION['role'] = $status['role'];
        $_SESSION['isLoggedIn'] = true;

        if ($_SESSION['role'] == "customer") {
            header('location:../view/menu.php');
            exit();
        } else if ($_SESSION['role'] == "admin") {
            header('location:../view/dashboard.php');
            exit();
        } else if ($_SESSION['role'] == "staff") {
            header('location:../view/assigned.php');
            exit();
        } else {
            // If role is unknown, logout for safety
            session_unset();
            session_destroy();
            echo "Invalid role.";
            exit();
        }
    } else {
        echo "Invalid Credentials";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    loginController();
} else {
    echo "Invalid";
}
?>
