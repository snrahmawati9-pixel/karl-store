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
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
                 <?php  require_once 'categories.php'; ?>
    </div>
    <div id="wrapper">
       <?php  require_once 'header.php'; ?>
        <section class="welcome_area">
            <div class="welcome_slides owl-carousel">
                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(img/bg-img/bg-1.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text">
                                    <h6 data-animation="bounceInDown" data-delay="0" data-duration="500ms">* Only today we offer free shipping</h6>
                                    <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Fashion Trends</h2>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(img/bg-img/bg-4.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text">
                                    <h6 data-animation="fadeInDown" data-delay="0" data-duration="500ms">* Only today we offer free shipping</h6>
                                    <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Summer Collection</h2>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single_slide height-800 bg-img background-overlay" style="background-image: url(img/bg-img/bg-2.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="welcome_slide_text">
                                    <h6 data-animation="fadeInDown" data-delay="0" data-duration="500ms">* Only today we offer free shipping</h6>
                                    <h2 data-animation="bounceInDown" data-delay="500ms" data-duration="500ms">Women Fashion</h2>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="new_arrivals_area section_padding_100_0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>THIS PRODUCT</h2>
                        </div>
                    </div>
                </div>
            </div>

                <?php require_once 'menu5.php'; ?>
   
                     <div class="col-12" data-wow-delay="0.2s">
                        <?php 
                        $data=mysqli_query(@$con, "select * from product a where product_stok>=1 and categori_nama='Bags & Purses'");
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
                                  <a href="detail_product.php?id=<?php echo $rowData['product_id'];?>" class="add-to-cart-btn">VIEW FULL PRODUCT DETAIL</a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                     </div>
        </section>
        <?php require_once 'iklan.php'; ?>
        <?php  require_once 'footer.php'; ?>
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