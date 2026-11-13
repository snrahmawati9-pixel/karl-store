<?php 
require_once 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <?php require_once 'title.php'; ?>
</head>

<body>
    <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
            <?php  require_once 'categories.php'; ?>
    </div>
   
    <div id="wrapper">
        <?php require_once 'header.php'; ?>

        <section class="top-discount-area d-md-flex align-items-center">
            <div class="single-discount-area">
            </div>
            <div class="single-discount-area">
            </div>
            <div class="single-discount-area">
            </div>
        </section>
        <br>
        <div class="breadcumb_area">
            <div class="container">
                <h1><center>Welcome to Karl Fashion!</center></h1>
            </div>
        </div>

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">
                         
                                <div class="row">
                                    <p>Karl Fashion is an online fashion store that offers a variety of stylish and comfortable clothing for your everyday needs. We believe that fashion is a way to express your personality and confidence.</p>
                                        <br>
                                        <p>Our goal is to provide a convenient and enjoyable online shopping experience by offering a curated collection of fashion products with an easy-to-use shopping platform.</p>
                                        <br>
                                        <p>At Karl Fashion, we are committed to making fashion accessible, helping you find styles that suit your preferences and everyday lifestyle.</p>
                                        <br>
                                        <br>
                                        <h4>Discover your style with Karl Fashion!</h4>
                                </div>
                    </div>
                </div>
                    <br>
                    <?php require_once 'footer.php'; ?>
        </section>
    </div>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>