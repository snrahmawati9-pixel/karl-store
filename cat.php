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

        <section class="new_arrivals_area section_padding_100_0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>Product Cat Eyewear</h2>
                                
                             <div class="col-12" data-wow-delay="0.2s">
                                <?php 
                                $data=mysqli_query($con, "select * from product where product_stok>=1 and categori_id='C1007'");
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
                                                <a href="detail_product.php?id=<?php echo $rowData['product_id'];?>" class="add-to-cart-btn">View Full Product Details</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once'iklan.php'; ?>
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