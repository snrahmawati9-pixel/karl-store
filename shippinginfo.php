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
                <h1><center>SHIPPING</center></h1>
            </div>
        </div>

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">
                         <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h4>Shipping Information</h4>
                                        <p>Karl Fashion aims to deliver your orders safely and conveniently.</p>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <h4>Order Processing</h4>
                                        <p>Orders are processed after payment confirmation. Processing time may vary depending on order volume and product availability.</p>
                                    </div>

                                     <div class="col-12 mb-3">
                                        <h4>Delivery Time</h4>
                                        <p>Delivery time depends on the shipping destination and courier service selected.</p>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <h4>Shipping Costs</h4>
                                        <p>Shipping fees are calculated based on the delivery address, package weight, and selected courier service.</p>
                                    </div>

                                     <div class="col-12 mb-3">
                                        <h4>Order Tracking</h4>
                                        <p>Once your order has been shipped, tracking information will be provided when available.</p>
                                        <br>
                                        <p>Please ensure that your shipping address and contact details are correct before completing your purchase.</p>
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