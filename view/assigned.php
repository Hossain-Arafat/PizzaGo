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
            <tr>
              <td>#12345</td>
              <td>John Doe</td>
              <td>2:30 PM</td>
              <td><span class="status pending">Pending</span></td>
               <td>
              <a href="update.php" class="btn">Update Status</a>
              </td>
            </tr>

            <tr>
              <td>#12344</td>
              <td>Jane Smith</td>
              <td>2:15 PM</td>
              <td><span class="status preparing">Preparing</span></td>
              <td>
              <a href="update2.php" class="btn">Update Status</a>
              </td>

            </tr>

          </tbody>
        </table>
      </div>

    </div>
  </div>

<?php include "footer.php"; ?>

</body>
</html>
