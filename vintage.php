<?php 
require_once 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php  require_once 'title.php' ?>
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

        <!-- ****** Header Area Start ****** -->
       <?php  require_once 'header.php'; ?>
        <!-- ****** Header Area End ****** -->
        
        <section class="new_arrivals_area section_padding_100_0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>PRODUCT KACAMATA MODEL VINTAGE</h2>
                        </div>
                    </div>
                </div>
            </div>
   
                 
                     <div class="col-12" data-wow-delay="0.2s">
                        <?php 
                        $data=mysqli_query($con, "select * from product where product_stok>=1 and categori_id='C1008'");
                        while($rowData=mysqli_fetch_array($data))
                        {
                            ?>
                            
                            <div class="listProduct">
                                <div class="product-img">
                                    <img src="product/<?php echo $rowData['product_gambar'];?>" >
                                        <div class="product-quicview">
                                          
                                        </div>
                                </div>
                                <div class="product-description">
                                    <h4 class="product-price"><?php echo "Rp ".number_format($rowData['product_harga'], 0, ",", "."); ?></h4>
                                        <p><?php echo $rowData['product_nama']; ?></p>
                            <!-- Add to Cart -->
                                    <a href="detail_product.php?id=<?php echo $rowData['product_id'];?>" class="add-to-cart-btn">View Full Product Details</a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                     </div>

    
    </section>

        
        <!-- ****** New Arrivals Area End ****** -->

        <!-- ****** Offer Area Start ****** -->
        <section class="offer_area height-700 section_padding_100 bg-img" style="background-image: url(img/bg-img/bg-5.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-end justify-content-end">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                            <h2>White t-shirt <span class="karl-level">Hot</span></h2>
                            <p>* Free shipping until 25 Jan 2019</p>
                            <div class="offer-product-price">
                                <h3><span class="regular-price">Rp250.900</span> Rp150.900</h3>
                            </div>
                            <a href="#" class="btn karl-btn mt-30">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****** Offer Area End ****** -->

    
        <!-- ****** Footer Area Start ****** -->
        <?php  require_once 'footer.php'; ?>
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