<?php
require_once "../model/pizza.php";

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    echo "Invalid request.";
    exit();
}

$id = trim($_POST['id'] ?? '');

if ($id === '' || !is_numeric($id)) {
    echo "Invalid pizza id.";
    exit();
}

$ok = deletePizza((int)$id);

if ($ok) {
    echo "SUCCESS";
} else {
    echo "Delete failed (DB error).";
}
