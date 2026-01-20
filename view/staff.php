<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
$activePage = "staff";
require_once "../model/user.php";
$staffList = getAllStaff();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PizzaGo|Manage Staff</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/staff.css">
</head>

<body>

<?php include "header.php"; ?>

<div class="dashboard-layout">
    <?php require "sidebar.php"; ?>

    <div class="main">
        <div class="page-header">
            <h1>Manage Staff Accounts</h1>
            <a href="add_staff.php" class="btn">Add Staff</a>
        </div>

        <div class="box">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th style="width: 90px;">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(!empty($staffList)) : ?>
                    <?php foreach($staffList as $staff) : ?>
                        <tr>
                            <td><?= htmlspecialchars($staff['name']) ?></td>
                            <td><?= htmlspecialchars($staff['email']) ?></td>
                            <td>
                                <form action="../controller/deleteStaffController.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $staff['id'] ?>">
                                    <button type="submit" class="icon-btn"
                                        onclick="return confirm('Are you sure you want to delete this staff account?');">
                                        🗑️
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" style="text-align:center; padding: 18px;">
                            No staff accounts found.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

</body>
</html>
