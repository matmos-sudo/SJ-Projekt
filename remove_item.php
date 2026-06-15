<?php
session_start();

if (isset($_GET['id'])) {
    $product_id_to_remove = $_GET['id'];

    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        $key = array_search($product_id_to_remove, $_SESSION['cart']);

        if ($key !== false) {
            unset($_SESSION['cart'][$key]);

            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

header("Location: cart.php");
exit();
