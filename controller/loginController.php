<?php
session_start();
require_once "../model/user.php";

function loginController(){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user = [
        "email" => $email,
        "password" => $password
    ];

    $status = loginUser($user);

    if($status){
        $_SESSION['name'] =  $status['name'];
        $_SESSION['email'] =  $status['email'];
        $_SESSION['role'] =  $status['role'];
        $_SESSION['isLoggedIn'] = true;

        //print_r($_SESSION);
        if($_SESSION['role']=="customer"){
            header('location:../view/menu.php');
            exit();
        }else if($_SESSION['role']=="admin"){
            header('location:../view/dashboard.php');
            exit();
        }else if($_SESSION['role']=="staff"){
            header('location:../view/assigned.php');
            exit();
        }
    }else{
        echo "Invalid Credentitals";
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    loginController();
} else{
    echo"Invalid";
}
?>