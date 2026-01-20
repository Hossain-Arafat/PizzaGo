<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
require_once "../model/order.php";
$orders = getRecentOrdersForAdmin();
?>

<!DOCTYPE html>
<html>
<head>
  <title>PizzaGo | Assigned Orders</title>
  <link rel="stylesheet" href="../css/common.css">
  <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/assigned.css">
</head>
<body>

<?php include "header.php"; ?>

  <div class="layout">
    <div class="sidebar">
      <a class="menu active" href="#">
        Assigned Orders
      </a>
      <a class="menu" href="availability.php">
        Update Availability
      </a>
      <a class="menu" href="profile.php">
        Profile
      </a>
      <a class="menu" href="../controller/logoutController.php">
        Logout
      </a>
    </div>

    <div class="content">
      <h1>Assigned Orders</h1>

      <div class="card">
        <table>
          <thead>
            <tr>
              <th>ORDER ID</th>
              <th>CUSTOMER NAME</th>
              <th>ORDER TIME</th>
              <th>CURRENT STATUS</th>
              <th>ACTIONS</th>
            </tr>
          </thead>

          <tbody>
            <?php if (!empty($orders)) : ?>
              <?php foreach ($orders as $o) : ?>
                <tr>
                  <td>#<?= (int)$o['id'] ?></td>
                  <td><?= htmlspecialchars($o['customer_name']) ?></td>
                  <td><?= date("h:i A", strtotime($o['created_at'])) ?></td>
                  <td>
                    <span class="status preparing">
                      <?= htmlspecialchars($o['status']) ?>
                    </span>
                  </td>
                  <td>
                    
                    <a href="update.php?order_id=<?= (int)$o['id'] ?>" class="btn">Update Status</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="5" style="text-align:center; padding:16px;">
                  No assigned/active orders found.
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
