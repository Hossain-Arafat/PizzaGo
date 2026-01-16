<?php
require_once "../model/user.php";
function regController(){
    /*if(!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'])){
        return false;
    }*/
    $name= trim($_POST['name']);
    $email= trim($_POST['email']);
    $password= trim($_POST['password']);
    $role= trim($_POST['role']);

    $user = [
        'id'=> null,
        'name'=>$name,
        'email'=>$email,
        'password'=>$password,
        'role'=>$role,
    ];
    $status=regUsers($user);

    if($status){
        return true;
    } else{
        return false;
    }
}
if($_SERVER['REQUEST_METHOD']== "POST"){
    if(regController()){
        header("location: ../view/staff.php");
        exit();
    } else{
        echo "something went wrong";
    }
} else{
    echo "server problem";
}
?>