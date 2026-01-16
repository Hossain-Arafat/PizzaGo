<?php
session_start();
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("location: ../view/profile.php");
    exit();
}

$name  = trim($_POST['name'] ?? "");
$email = trim($_POST['email'] ?? "");

if ($name === "" || $email === "") {
    header("location: ../view/profile.php");
    exit();
}

// Identify user by the email they logged in with
$currentEmail = $_SESSION['email'];

$status = updateProfile($currentEmail, $name, $email);

if ($status) {
    // update session so UI updates immediately
    $_SESSION['name']  = $name;
    $_SESSION['email'] = $email;
}

// No messages, just return to same page
header("location: ../view/profile.php");
exit();
