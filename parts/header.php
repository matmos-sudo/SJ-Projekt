
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">Training<em> Studio</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="products_page.php">Shop</a></li>
                        <li class="scroll-to-section"><a href="#our-classes">Classes</a></li>
                        <li class="scroll-to-section"><a href="#schedule">Schedules</a></li>
                        <li class="scroll-to-section"><a href="#contact-us">Contact</a></li>
                        <?php if(isset($_SESSION['name'])): ?>
                            <li><a href="cart.php">Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a></li>
                            <li class="main-button"><a href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li class="main-button"><a href="signup.php">SignUp</a></li>
                            <li class="main-button"><a href="login.php">Log in</a></li>
                        <?php endif; ?>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>