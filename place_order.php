<?php

require_once 'classes/auth.php';
require_once 'classes/product.php';
session_start();
checkLogin();

if (!empty($_SESSION['cart'])) {
    $product = new Product();

    $cartQuantities = array_count_values($_SESSION['cart']);

    foreach ($cartQuantities as $product_id => $qty) {

        $product->reduceStock($product_id, $qty);
    }


    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Training Studio - Order Successful</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">

    <link rel="stylesheet" href="assets/css/order.css">


</head>

<body>

<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<?php require_once 'parts/header.php'; ?>
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/gym-video.mp4" type="video/mp4" />
    </video>
    <div class="video-overlay header-text">
        <div class="caption">
            <section class="section" id="cart-container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="success-card">
                                <div class="success-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <h2><em>SUCCESSFUL</em></h2>
                                <p>
                                    Your order has been logged securely. Thank you for fueling your gains with us!
                                    Your premium workout gear and supplements are already being packed and prepared for shipment.
                                    Get ready to crush your next session!
                                </p>
                                <a href="products_page.php" class="gym-back-btn">
                                    <i class="fa fa-arrow-left"></i> BACK TO PRODUCTS
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php include_once $footer = 'parts/footer.php';
if(!$footer){
    echo 'Could not find the footer';
}
?>
<script src="assets/js/jquery-2.1.0.min.js"></script>

<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/mixitup.js"></script>
<script src="assets/js/accordions.js"></script>

<script src="assets/js/custom.js"></script>

</body>
</html>