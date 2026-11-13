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
                <h2><center>Return & Exchange Policy</center></h2>
            </div>
        </div>

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">
                         <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h6>At Karl Fashion, customer satisfaction is important to us. We accept return or exchange requests under the following conditions:</h6>
                                        <br>
                                        <ul style="list-style: disc !important; padding-left: 25px !important; margin: 15px 0 !important;">
                                            <li style="display: list-item !important; list-style: disc !important;">
                                                Return requests must be submitted within 7 days of receiving the product.
                                            </li>
                                            <li style="display: list-item !important; list-style: disc !important;">
                                                Products must be unused, unworn, and in their original condition.
                                            </li>
                                            <li style="display: list-item !important; list-style: disc !important;">
                                                Original tags and packaging must be included.
                                            </li>
                                            <li style="display: list-item !important; list-style: disc !important;">
                                                Proof of purchase is required.
                                            </li>
                                            <li style="display: list-item !important; list-style: disc !important;">
                                                Damaged or incorrect items may be eligible for a return or exchange.
                                            </li>
                                        </ul>
                                        <br>
                                        <p>Please contact our customer service before sending any items back.</p>
                                             <strong>Note:</strong> Returns are subject to inspection and approval.
                                        </p>
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