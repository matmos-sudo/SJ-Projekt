<?php
require_once 'classes/auth.php';
checkLogin();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][] = $product_id;
    session_write_close();
    header("Location: products_page.php?added=1");
    exit();

} else {
    header("Location: products_page.php");
    exit();
}
