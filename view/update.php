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
      <a class="menu " href="update-status.php">Update Availability</a>
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
            <span class="right">#12345</span>
          </div>

          <div class="row">
            <span class="left">Customer:</span>
            <span class="right">John Doe</span>
          </div>

          <div class="row">
            <span class="left">Order Time:</span>
            <span class="right">2:30 PM</span>
          </div>

          <div class="row">
            <span class="left">Items:</span>
            <span class="right">2 Pizzas</span>
          </div>
        </div>
      </div>

      
      <div class="card" style="margin-top:18px;">
        <h3 class="card-title">Update Status</h3>

        <form novalidate>
          <label>Order Status <span class="req">*</span></label>
          <select class="select">
            <option>Pending</option>
            <option selected>Preparing</option>
            <option>Ready</option>
            <option>Delivered</option>
          </select>

          <div class="btn-row">
            <button type="submit" class="btn">Update Status</button>
            <a class="btn-cancel" href="assigned.php">Cancel</a>
          </div>
        </form>
      </div>

    </div>
  </div>

  <?php include "footer.php"; ?>

</body>
</html>
