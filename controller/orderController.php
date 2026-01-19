<?php
require_once "../model/pizza.php";
require_once "../model/order.php";
session_start();

/* ADD TO CART */
if (isset($_POST['add_to_cart'])) {

    $pizzaId = (int)$_POST['pizza_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$pizzaId])) {
        $_SESSION['cart'][$pizzaId] += 1;
    } else {
        $_SESSION['cart'][$pizzaId] = 1;
    }

    header("Location: ../view/cart.php");
    exit();
}

/* REMOVE ITEM */
if (isset($_POST['remove_item'])) {
    $pizzaId = (int)$_POST['pizza_id'];
    unset($_SESSION['cart'][$pizzaId]);

    header("Location: ../view/cart.php");
    exit();
}

/* PLACE ORDER */
if (isset($_POST['place_order'])) {

    $userId = $_SESSION['user_id'];
    $cart = $_SESSION['cart'];

    if (empty($cart)) {
        header("Location: ../view/cart.php");
        exit();
    }

    placeOrder($userId, $cart);

    unset($_SESSION['cart']); // clear cart
    header("Location: ../view/orders.php");
    exit();
}
