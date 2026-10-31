<?php 
require_once 'session.php';
if(empty($_SESSION['snrm9427_ecommerce']))
{
    header("location:login2.php");
}

if(@$_GET['do']=='hapus')
{
    unset($_SESSION['myCart'][$_GET['id']]);
}
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
        <!--  Side Nav  -->
       
        <?php require_once 'categories.php'; ?>
    </div>

    <div id="wrapper">
        <?php require_once 'header.php'; ?>

        <!-- ****** Top Discount Area Start ****** -->
        <section class="top-discount-area d-md-flex align-items-center">
            <!-- Single Discount Area -->
            <div class="single-discount-area">
            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">
            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">
            </div>
        </section>
        <!-- ****** Top Discount Area End ****** -->

        <!-- ****** Cart Area Start ****** -->
        <div class="cart_area section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <?php 
                                foreach (@$_SESSION['myCart'] as $productId => $jmlOrder)
                                {
                                $product=mysqli_query($con, "select * from product where product_id = '".$productId."'");
                                $rowProduct=mysqli_fetch_array($product);
                                ?>
                                <tbody>
                                    <tr>
                                        <td class="cart_product_img d-flex align-items-center">
                                            <a href="#"><img src="product/<?php echo $rowProduct['product_gambar']?>" alt="Product"></a>
                                            
                                            <h6><?php echo $rowProduct['product_nama']?></h6>
                                        </td>
                                        <td class="price"><span><?php echo "Rp ".number_format($rowProduct['product_harga'], 0, ",", "."); ?></span></td>
                                            
                                        <td class="qty">
                                            <div class="quantity" align="center">
                                               <span class="qty-minus"></span>
                                                <input  class="qty-text" value="<?php echo $jmlOrder; ?>">
                                                <span class="qty-plus"></span>
                                            </div>
                                        </td>
                                            <?php 
                                            $subtotal=$jmlOrder*$rowProduct['product_harga'];
                                        
                                            ?>
                                    <td class="total_price"><span><?php echo "Rp ". number_format(@$subtotal, 0, ",", "."); ?></span></td>
                                    </tr>
                                </tbody>
                                 <?php
                                }
                            ?>
                            </table>
                        </div>

                        <div class="cart-footer d-flex mt-30">
                            <div class="back-to-shop w-50">
                                <a href="product.php">Continue shooping</a>
                            </div>
                            <div class="update-checkout w-50 text-right">
                                <a href="cart.php?do=hapus&id=<?php echo $productId?>">clear cart</a>
                                
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="coupon-code-area mt-70">
                            <div class="cart-page-heading">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <?php require_once 'shipping.php'; ?>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-total-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Cart total</h5>
                                <p>Final info</p>
                            </div>
                            <ul class="cart-total-chart">
                                <li><span>Shipping</span> <span>Free</span></li>
                                <li><span><strong>Total</strong></span> 

                                    <span><strong><?php echo "Rp ". number_format(@$total, 0, ",", "."); ?></strong></span></li>
                                     <?php 
                                       
                                        @$total+=$subtotal;
                                        ?>
                            </ul>
                            <a href="checkout.php" class="btn karl-checkout-btn">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** Cart Area End ****** -->

        <!-- ****** Footer Area Start ****** -->
        <?php require_once 'footer.php'; ?>

        <!-- ****** Footer Area End ****** -->
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