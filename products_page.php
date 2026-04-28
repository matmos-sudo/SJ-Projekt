<?php require_once 'classes/auth.php';
      require_once 'classes/product.php';
      $product = new Product();
      $allProducts = $product->getProducts();
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

    <link rel="stylesheet" href="assets/css/products.css">

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
        <section class="section" id="products">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading">
                            <h2><em>Our Products</em></h2>
                            <img src="assets/images/line-dec.png" alt="">
                            <p>Support your training with our premium gym supplements and gear.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($allProducts as $product):?>
                    <div class="col-lg-4">
                        <div class="product-item">
                            <div class="image-thumb">
                                <img src="<?php echo $product['img_url'];?>" alt="">
                            </div>
                            <div class="down-content">
                                <span>$<?php echo number_format($product['product_price'],2);?></span>
                                <h4><?php echo htmlspecialchars($product['product_name']);?></h4>
                                <p><?php echo htmlspecialchars($product['description']);?></p>
                                <div class="main-button">
                                    <a href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Features Item Start ***** -->

<!-- ***** Testimonials Ends ***** -->

<!-- ***** Contact Us Area Starts ***** -->

<!-- ***** Contact Us Area Ends ***** -->

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