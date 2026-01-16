<?php
$activePage = "staff";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Staff - PizzaGo</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/staff.css">
</head>

<body>

    <?php include "header.php" ?>

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
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Michael Chen</td>
                            <td>michael@pizzago.com</td>
                        </tr>
                        <tr>
                            <td>Sarah Johnson</td>
                            <td>sarah@pizzago.com</td>
                        </tr>
                        <tr>
                            <td>David Lee</td>
                            <td>david@pizzago.com</td>
                        </tr>
                        <tr>
                            <td>Emma Wilson</td>
                            <td>emma@pizzago.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>

</body>
</html>
