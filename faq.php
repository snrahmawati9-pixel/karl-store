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
                <h2><center>Frequently Asked Questions</center></h2>
            </div>
        </div>

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">
                         <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h5>1. How can I place an order?</h5>
                                        <p>Browse our product collection, select your favorite item, choose the desired size and quantity, then add it to your shopping cart and proceed to checkout.</p>
                                    </div>
                                  
                                    <div class="col-12 mb-3">
                                        <h5>2. Can I change my order after placing it?</h5>
                                        <p>Please contact our customer service as soon as possible if you need to make changes to your order.<br>Changes depend on the order processing status.</p>
                                    </div>

                                    <div class="col-12 mb-3">
                                       <h5>3. How can I track my order?</h5>
                                        <p>Once your order has been shipped, you will receive shipping information to help you track your package.</p>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <h5>4. What payment methods are available?</h5>
                                        <p>Available payment methods will be displayed during the checkout process.</p>
                                    </div>
                                        
                                    <div class="col-12 mb-3">
                                        <h5>5. How can I contact Karl Fashion?</h5>
                                        <p>You can contact our customer service through the contact information provided on our website.</p>
                                    </div>
                                </div> 
                            </form>
                    </div>
                </div>
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