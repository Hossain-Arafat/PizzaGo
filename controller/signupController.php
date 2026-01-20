<?php
require_once "../model/user.php";

function regController()
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

    if ($role !== "customer") {
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
        return ["ok" => true, "msg" => "Registered"];
    } else {
        return ["ok" => false, "msg" => "Email already exists or registration failed."];
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $result = regController();

    if ($result["ok"]) {
        header("location: ../view/login.php");
        exit();
    } else {
        echo $result["msg"];
        exit();
    }

} else {
    echo "server problem";
}
?>
