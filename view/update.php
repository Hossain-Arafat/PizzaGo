<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}


require_once "../model/order.php";

$orderId = (int)($_GET['order_id'] ?? 0);
if ($orderId <= 0) {
    header("Location: assigned.php");
    exit();
}

$order = getOrderDetailsForUpdate($orderId);
if (!$order) {
    header("Location: assigned.php");
    exit();
}

$currentStatus = strtolower($order['status']);
$itemsText = !empty($order['items']) ? $order['items'] : "No items";
?>
<!DOCTYPE html>
<html>
<head>
  <title>PizzaGo | Update Status</title>
  <link rel="stylesheet" href="../css/common.css">
  <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/update.css">
</head>
<body>

<?php include "header.php"; ?>

  <div class="layout">

    <div class="sidebar">
      <a class="menu" href="assigned.php">Assigned Orders</a>
      <a class="menu" href="availability.php">Update Availability</a>
      <a class="menu" href="profile.php">Profile</a>
      <a class="menu" href="../controller/logoutController.php">Logout</a>
    </div>

    <div class="content">
      <h1>Update Order Status</h1>

      <div class="card">
        <h3 class="card-title">Order Details</h3>

        <div class="details">
          <div class="row">
            <span class="left">Order ID:</span>
            <span class="right">#<?= (int)$order['id'] ?></span>
          </div>

          <div class="row">
            <span class="left">Customer:</span>
            <span class="right"><?= htmlspecialchars($order['customer_name']) ?></span>
          </div>

          <div class="row">
            <span class="left">Order Time:</span>
            <span class="right"><?= date("h:i A", strtotime($order['created_at'])) ?></span>
          </div>

          <div class="row">
            <span class="left">Items:</span>
            <span class="right"><?= htmlspecialchars($itemsText) ?></span>
          </div>
        </div>
      </div>

      <div class="card" style="margin-top:18px;">
        <h3 class="card-title">Update Status</h3>

        <form action="../controller/pizzaStatusController.php" method="post" novalidate>
          <input type="hidden" name="order_id" value="<?= (int)$order['id'] ?>">

          <label>Order Status <span class="req">*</span></label>
          <select class="select" name="status" required>
            <option value="pending"   <?= $currentStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="preparing" <?= $currentStatus === 'preparing' ? 'selected' : '' ?>>Preparing</option>
            <option value="ready"     <?= $currentStatus === 'ready' ? 'selected' : '' ?>>Ready</option>
            <option value="delivered" <?= $currentStatus === 'delivered' ? 'selected' : '' ?>>Delivered</option>
          </select>

          <div class="btn-row">
            <button type="submit" name="update_status" class="btn">Update Status</button>
            <a class="btn-cancel" href="assigned.php">Cancel</a>
          </div>
        </form>
      </div>

    </div>
  </div>

<?php include "footer.php"; ?>

</body>
</html>
