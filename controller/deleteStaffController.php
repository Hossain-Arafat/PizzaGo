<?php
require_once "../model/user.php";

function deleteStaffController(){
    $id = trim($_POST['id'] ?? '');

    if($id === '' || !is_numeric($id)){
        return false;
    }

    return deleteStaff((int)$id);
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(deleteStaffController()){
        header("location: ../view/staff.php");
        exit();
    } else {
        echo "Delete failed (invalid id / DB error).";
    }
} else {
    echo "Invalid request.";
}
?>
