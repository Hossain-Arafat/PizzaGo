<?php
require_once "../model/user.php";

function regController()
{
    // 1) Check required fields exist
    if (!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'])) {
        return ["ok" => false, "msg" => "Invalid request."];
    }

    // 2) Trim inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    // 3) Validate required
    if ($name === "" || $email === "" || $password === "" || $role === "") {
        return ["ok" => false, "msg" => "All fields are required."];
    }

    // Name validation (simple)
    if (strlen($name) < 2) {
        return ["ok" => false, "msg" => "Name must be at least 2 characters."];
    }

    // Email format validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ["ok" => false, "msg" => "Invalid email format."];
    }

    // Password validation (alphanumeric + min 6)
    if (!preg_match('/^[A-Za-z0-9]{6,}$/', $password)) {
        return ["ok" => false, "msg" => "Password must be alphanumeric and at least 6 characters."];
    }

    // Role validation (only allow customer here)
    // Since your signup.php forces customer, this prevents manual tampering.
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
        // regUsers returns false for duplicate email too
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
