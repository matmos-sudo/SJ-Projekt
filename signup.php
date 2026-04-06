
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
    <link rel="stylesheet" href="assets/css/signup.css"

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
<?php require_once $header = 'parts/header.php';
if(!$header){
    echo 'Could not load header';
}
?>
<!-- ***** Header Area End ***** -->
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/gym-video.mp4" type="video/mp4" />
    </video>
    <div class="video-overlay header-text">
        <div class="container">
            <div class="signup-container">
                <div class="signup-header">
                    <h6>Work harder, get stronger</h6>
                    <h2>Join the <em>Team</em></h2>
                </div>

                <form id="signup-form" action="signup_process.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="fullname" id="fullname" placeholder="Full Name" required>
                    </div>
                    <div class="input-group">
                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                    </div>

                    <div class="main-button">
                        <button type="submit" id="form-submit">Become a Member</button>
                    </div>

                    <p class="login-link">Already a member? <a href="login.php">Log In</a></p>
                </form>
            </div>
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
<script src="assets/js/signup.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

</body>
</html>