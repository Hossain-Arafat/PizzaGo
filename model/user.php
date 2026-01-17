<?php
require_once 'connection.php';

function loginUser($user)
{
    $conn = dbConnection();
    $Query = "SELECT * FROM users WHERE email = '{$user['email']}' AND password = '{$user['password']}'";
    $result = mysqli_query($conn, $Query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }


    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function regUsers($user){
    $conn = dbConnection();

    $checkEmail = "SELECT * FROM users WHERE email='{$user['email']}'";
    $result = mysqli_query($conn, $checkEmail);

    if($result && mysqli_num_rows($result) > 0){
        return false;
    }

    $Query = "INSERT INTO users (name, email, password, role)
              VALUES ('{$user['name']}', '{$user['email']}', '{$user['password']}', '{$user['role']}')";

    if(mysqli_query($conn, $Query)){
        return true;
    }
    return false;
}

function updateProfile($currentEmail, $newName, $newEmail) {
    $conn = dbConnection();
    $sql = "UPDATE users 
            SET name='{$newName}', email='{$newEmail}'
            WHERE email='{$currentEmail}'";

    return mysqli_query($conn, $sql) ? true : false;
}

function updatePassword($email, $password) {
    $conn = dbConnection();
    $sql = "UPDATE users 
            SET password='{$password}'
            WHERE email='{$email}'";

    return mysqli_query($conn, $sql) ? true : false;
}


function getAllStaff(){
    $conn = dbConnection();

    $query = "SELECT id, name, email 
              FROM users 
              WHERE role='staff'
              ORDER BY id DESC";

    $result = mysqli_query($conn, $query);

    $staffList = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $staffList[] = $row;
        }
    }
    return $staffList;
}

function deleteStaff($id){
    $conn = dbConnection();
    $id = (int)$id;

    // Optional safety: only delete if role is staff
    $query = "DELETE FROM users WHERE id=$id AND role='staff'";
    return mysqli_query($conn, $query) ? true : false;
}



?>