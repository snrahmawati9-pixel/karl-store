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
       

        <!-- ****** Checkout Area Start ****** -->
        <div class="checkout_area section_padding_100">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-page-heading">
                                <h5>Billing Address</h5>
                                
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label> Name </label>
                                        <input class="form-control" value="<?php echo $rowUser['email'];?>">
                                    </div>
                                  
                                    
                                    <div class="col-12 mb-3">
                                        <label for="street_address">Address <span>*</span></label>
                                         <input class="form-control" value="<?php echo $rowUser['alamat']; ?>">
                                        
                                    </div>
                    
                                    <div class="col-12 mb-3">
                                        <label for="phone_number">Phone No <span>*</span></label>
                                        <input  class="form-control" value="<?php echo $rowUser['telepon']; ?>">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="email_address">Email Address <span>*</span></label>
                                        <input class="form-control"  value="<?php echo $rowUser['email']; ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <div class="order-details-confirmation">

                            <div class="cart-page-heading">
                                <h5>Your Order</h5>
                                <p>The Details</p>
                            </div>

                            <ul class="order-details-form mb-4">
                                <li><span>Product</span> <span>Total</span></li>
                                <?php 
                                foreach (@$_SESSION['myCart'] as $productId => $jmlOrder)
                                {
                                   $product=mysqli_query($con, "select * from product where product_id = '".$productId."'");
                                   $rowProduct=mysqli_fetch_array($product);
                                ?>

                                <li>
                                    <span><?php echo $rowProduct['product_nama']; ?></span> <span><?php echo number_format($rowProduct['product_harga'], 0, ",", "."); ?></span>
                                </li>
                                 <?php 
                                $subtotal=$jmlOrder*$rowProduct['product_harga'];
                                 ?>
                                <li><span>Subtotal</span> <span><?php echo number_format($subtotal, 0, ",", "."); ?></span></li>
                                 <?php
                                }
                            ?>
                                <li><span>Shipping</span> <span>Free</span></li>
                                <li><span>Total</span> <span><?php echo number_format($total, 0, ",", "."); ?></span></li>
                                <?php
                                 @$total+=$subtotal;
                                 ?>
                            </ul>
                            <a href="prosesOrder.php">
                            <input type="button" name="prosesOrder" class="btn karl-checkout-btn" value="Place Order">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ****** Checkout Area End ****** -->
        <?php require_once 'footer.php'; ?>
        
    </div>
    <!-- /.wrapper end -->

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