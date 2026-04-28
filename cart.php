<?php require_once 'classes/auth.php';
      require_once 'classes/product.php';

      checkLogin();

      $product = new Product();
      $allProducts = $product->getProducts();
      $cartID = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
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
                                <h2>YOUR <em>CART</em></h2>
                                <p>Review your items and proceed to checkout.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart-table-card">
                                <table class="table cart-table">
                                    <thead>
                                    <tr>
                                        <th>PRODUCT</th>
                                        <th>PRICE</th>
                                        <th>QUANTITY</th>
                                        <th>TOTAL</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($cartID)):?>
                                        <?php
                                        $counts = array_count_values($cartID);
                                        $subtotal = 0;

                                        foreach($counts as $id => $qty):
                                            foreach($allProducts as $p):
                                            if($p['product_id'] == $id):
                                                $itemTotal= $p['product_price'] * $qty;
                                                $subtotal += $itemTotal;
                                        ?>
                                                <tr>
                                                <td class="product-info">
                                                    <img src="<?php echo $p['img_url']; ?>" alt="" class="cart-product-img">
                                                    <div class="product-details">
                                                        <h6 class="product-name"><?php echo htmlspecialchars($p['product_name']); ?></h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle">$<?php echo number_format($p['product_price'], 2); ?></td>
                                                <td class="align-middle"><?php echo $qty; ?></td>
                                                <td class="align-middle">$<?php echo number_format($itemTotal, 2); ?></td>
                                                <td class="align-middle">
                                                    <a href="remove_item.php?id=<?php echo $id; ?>" class="remove-btn">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                            <?php
                                            endif;
                                            endforeach;
                                        endforeach;
                                        ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="empty-cart-msg">
                                                <p>Your cart is currently empty.</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                                <div class="cart-footer">
                                    <a href="products_page.php" class="continue-shopping">
                                        <i class="fa fa-arrow-left"></i> CONTINUE SHOPPING
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="summary-card">
                                <h5>ORDER SUMMARY</h5>

                                <div class="summary-line">
                                    <span>Subtotal</span>
                                    <span>$<?php echo number_format(isset($subtotal) ? $subtotal : 0, 2); ?></span>
                                </div>

                                <div class="summary-line">
                                    <span>Shipping <i class="fa fa-info-circle"></i></span>
                                    <span class="free">FREE</span>
                                </div>

                                <div class="summary-line">
                                    <span>Tax (Estimated)</span>
                                    <span>$<?php echo number_format((isset($subtotal) ? $subtotal : 0) * 0.1, 2); ?></span>
                                </div>

                                <hr style="border-top: 1px solid rgba(255,255,255,0.1);">

                                <div class="summary-line total">
                                    <span>TOTAL</span>
                                    <span class="total-price">$<?php echo number_format((isset($subtotal) ? $subtotal : 0) * 1.1, 2); ?></span>
                                </div>

                                <div class="features">
                                    <p><i class="fa fa-truck"></i> FREE SHIPPING <i class="fa fa-check text-success float-right"></i></p>
                                    <p><i class="fa fa-history"></i> 30-DAY RETURNS <i class="fa fa-check text-success float-right"></i></p>
                                </div>
                                <?php if(!empty($cartID)): ?>
                                    <a href="checkout_process.php" class="checkout-btn">
                                        <i class="fa fa-lock"></i> PROCEED TO CHECKOUT
                                    </a>
                                <?php else: ?>
                                    <a href="#" class="checkout-btn disabled" style="opacity: 0.5; pointer-events: none;">
                                        <i class="fa fa-lock"></i> CART EMPTY
                                    </a>
                                <?php endif; ?>

                                <div class="payment-methods">
                                    <p>SECURE CHECKOUT</p>
                                    <img src="https://i.imgur.com/769996r.png" alt="payments" class="img-fluid" style="opacity: 0.6;">
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