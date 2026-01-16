<?php
session_start();
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("location: ../view/change_password.php");
    exit();
}

$password = trim($_POST['password'] ?? "");

if ($password === "") {
    header("location: ../view/change_password.php");
    exit();
}

// Identify user by the email they logged in with
$email = $_SESSION['email'];

$status = updatePassword($email,$password);

// No messages, just return to same page
header("location: ../view/profile.php");
exit();
