<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
require_once "../model/pizza.php";
$pizzas = getAllPizzas();
?>

<!DOCTYPE html>
<html>
<head>
  <title>PizzaGo|Stock Availability</title>
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

        <form action="../controller/pizzaAvailabilityController.php" method="post">

          <?php if (!empty($pizzas)) : ?>
            <?php foreach ($pizzas as $p) : ?>
              <?php
                $isInStock = ($p['availability'] === 'in_stock');
                $tagClass = $isInStock ? "in" : "out";
                $tagText  = $isInStock ? "In Stock" : "Out of Stock";
              ?>

              <div class="pizza-item">
                <div>
                  <b><?= htmlspecialchars($p['name']) ?></b><br>
                  <small>
                    Current Status:
                    <span class="tag <?= $tagClass ?>"><?= $tagText ?></span>
                  </small>
                </div>

                <label class="switch">
                  <input type="checkbox" name="availability[<?= (int)$p['id'] ?>]" <?= $isInStock ? "checked" : "" ?>>
                  <span class="slider"></span>
                </label>
              </div>

            <?php endforeach; ?>
          <?php else : ?>
            <p style="padding: 10px 2px;">No pizzas found.</p>
          <?php endif; ?>

          <button type="submit" name="save_availability" class="save-btn">Save Changes</button>

        </form>

      </div>
    </div>
  </div>

<?php include "footer.php"; ?>

</body>
</html>
