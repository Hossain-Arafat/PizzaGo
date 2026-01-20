<?php
session_start();
require_once "../model/user.php";

if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: ../view/login.php");
    exit();
}

function addStaffController()
{
    if (!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'])) {
        return ["ok" => false, "msg" => "Invalid request."];
    }

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    if ($name === "" || $email === "" || $password === "" || $role === "") {
        return ["ok" => false, "msg" => "All fields are required."];
    }

    if (strlen($name) < 2) {
        return ["ok" => false, "msg" => "Name must be at least 2 characters."];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ["ok" => false, "msg" => "Invalid email format."];
    }

    if (!preg_match('/^[A-Za-z0-9]{6,}$/', $password)) {
        return ["ok" => false, "msg" => "Password must be alphanumeric and at least 6 characters."];
    }

    if ($role !== "staff") {
        return ["ok" => false, "msg" => "Invalid role selected."];
    }

    $user = [
        'id' => null,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'role' => $role,
    ];

    $status = regUsers($user);

    if ($status) {
        return ["ok" => true, "msg" => "Staff created"];
    } else {
        return ["ok" => false, "msg" => "Email already exists or creation failed."];
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $result = addStaffController();

    if ($result["ok"]) {
        header("location: ../view/staff.php");
        exit();
    } else {
        echo $result["msg"];
        exit();
    }

} else {
    echo "Invalid request.";
}
?>
