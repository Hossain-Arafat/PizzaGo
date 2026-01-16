<!DOCTYPE html>
<html>
<head>
  <title>PizzaGo | Update Availability</title>
  <link rel="stylesheet" href="../css/common.css">
  <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/availability.css">
</head>
<body>

<?php include "header.php"; ?>


  <div class="layout">

    <div class="sidebar">
      <a class="menu" href="assigned.php">Assigned Orders</a>
      <a class="menu active" href="availability.php">Update Availability</a>
      <a class="menu" href="profile.php">Profile</a>
      <a class="menu" href="../controller/logoutController.php">Logout</a>
    </div>

    <div class="content">
      <h1>Update Pizza Availability</h1>

      <div class="list-card">


        <div class="pizza-item">
          <div>
            <b>Margherita</b><br>
            <small>Current Status: <span class="tag in">In Stock</span></small>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider"></span>
          </label>
        </div>

        <div class="pizza-item">
          <div>
            <b>Pepperoni</b><br>
            <small>Current Status: <span class="tag in">In Stock</span></small>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider"></span>
          </label>
        </div>

        <div class="pizza-item">
          <div>
            <b>Vegetarian</b><br>
            <small>Current Status: <span class="tag in">In Stock</span></small>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider"></span>
          </label>
        </div>

        <div class="pizza-item">
          <div>
            <b>Hawaiian</b><br>
            <small>Current Status: <span class="tag out">Out of Stock</span></small>
          </div>
          <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>

        <div class="pizza-item">
          <div>
            <b>BBQ Chicken</b><br>
            <small>Current Status: <span class="tag in">In Stock</span></small>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider"></span>
          </label>
        </div>

        <div class="pizza-item">
          <div>
            <b>Four Cheese</b><br>
            <small>Current Status: <span class="tag in">In Stock</span></small>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider"></span>
          </label>
        </div>

        <button class="save-btn">Save Changes</button>
      </div>
    </div>
  </div>

<?php include "footer.php"; ?>


</body>
</html>
