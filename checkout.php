<?php
require_once 'classes/auth.php';
require_once 'classes/product.php';

checkLogin();

// 1. Grab the cart from the session immediately
$cartID = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// 2. STRICT CHECK: If it's truly empty, THEN boot them out
if (empty($cartID) || count($cartID) < 1) {
    header("Location: products_page.php");
    exit();
}

$product = new Product();
$allProducts = $product->getProducts();

$counts = array_count_values($cartID);
$subTotal = 0;

// Calculate the final subtotal behind the scenes
foreach($counts as $id => $qty) {
    foreach($allProducts as $p) {
        if($p['product_id'] == $id) {
            $subTotal += ($p['product_price'] * $qty);
        }
    }
}

$tax = $subTotal * 0.1;
$total = $subTotal + $tax;
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Training Studio - Free CSS Template</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">

    <link rel="stylesheet" href="assets/css/cart.css">

</head>

<body>

<!-- ***** Preloader Start ***** -->
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
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<?php require_once 'parts/header.php'; ?>
<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
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
                            <div class="cart-title">
                                <h2>CHECK <em>OUT</em></h2>
                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="checkout-form">
                                                <h4 class="mb-4">SHIPPING DETAILS</h4>
                                                <form action="place_order.php" method="POST">
                                                    <div class="form-group mb-3">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Shipping Address</label>
                                                        <input type="text" class="form-control" name="address" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" name="city" required>
                                                    </div>
                                                    <button type="submit" class="place-order-btn mt-3">PLACE ORDER ($<?php echo number_format($total, 2); ?>)</button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="checkout-form">
                                                <h4 class="mb-4">YOUR ORDER</h4>
                                                <table class="table text-white">
                                                    <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    foreach($counts as $id => $qty):
                                                        foreach($allProducts as $p):
                                                            if($p['product_id'] == $id):
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo htmlspecialchars($p['product_name']); ?></td>
                                                                    <td><?php echo $qty; ?></td>
                                                                    <td>$<?php echo number_format($p['product_price'] * $qty, 2); ?></td>
                                                                </tr>
                                                            <?php
                                                            endif;
                                                        endforeach;
                                                    endforeach;
                                                    ?>
                                                    <tr class="border-top">
                                                        <td colspan="2">Subtotal</td>
                                                        <td>$<?php echo number_format($subTotal, 2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Tax (10%)</td>
                                                        <td>$<?php echo number_format($tax, 2); ?></td>
                                                    </tr>
                                                    <tr class="font-weight-bold" style="color: #ed563b;">
                                                        <td colspan="2">TOTAL</td>
                                                        <td>$<?php echo number_format($total, 2); ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->



<!-- ***** Footer Start ***** -->
<?php include_once $footer = 'parts/footer.php';
if(!$footer){
    echo 'Could not find the footer';
}
?>
<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/mixitup.js"></script>
<script src="assets/js/accordions.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

</body>
</html>