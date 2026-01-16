<?php
session_start();
require_once "../model/user.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header("location: ../view/forget.php");
    exit();
}
$email = trim($_POST['email'] ?? "");
$password = trim($_POST['password'] ?? "");

if ($password === ""||$email==="") {
    header("location: ../view/forget.php");
    exit();
}

$status = updatePassword($email,$password);

// No messages, just return to same page
header("location: ../view/login.php");
exit();
