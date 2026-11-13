<?php 
require_once 'session.php';

$data=mysqli_query($con, "select * from orderku where order_id='".$_GET['id']."'");
$rowData=mysqli_fetch_array($data);

// total = jumlah (qty x harga) dari order_detail + ongkir
$detail=mysqli_query($con, "select sum(order_detail_qty*orderdetail_harga) as subtotal from order_detail where order_id='".$_GET['id']."'");
$rowDetail=mysqli_fetch_array($detail);
$totalBayar=$rowDetail['subtotal']+$rowData['ongkir'];
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
       <?php  require_once 'header.php'; ?>
    
    <section class="top-discount-area d-md-flex align-items-center">
            <div class="single-discount-area">
            </div>
            <div class="single-discount-area">
            </div>
            <div class="single-discount-area">
            </div>
    </section>

        <section class="single_product_details_area section_padding_0_100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section_heading text-center">
                                <h2>ORDER ANDA BERHASIL !</h2>
                                <br>
                                 <p>Terima kasih sudah melakukan order. Id Order anda : <?php echo $_GET['id'] ?></p>

                                 <?php 
                                 if($rowData['pembayaran']=='Direct Bank Transfer')
                                 {
                                    ?>
                                    <br>
                                    <p>Metode pembayaran: <strong>Direct Bank Transfer</strong></p>
                                    <p>Silakan transfer ke rekening berikut:</p>
                                    <h5><?php echo $rowData['bank']; ?></h5>
                                    <h4>
                                        <?php 
                                        if($rowData['bank']=='Bank Mandiri')
                                        {
                                            echo '1234567890123';
                                        }
                                        elseif($rowData['bank']=='BCA')
                                        {
                                            echo '1234567890';
                                        }
                                        elseif($rowData['bank']=='BNI')
                                        {
                                            echo '123456789012';
                                        }
                                        elseif($rowData['bank']=='BRI')
                                        {
                                            echo '123456789012345';
                                        }
                                        ?>
                                    </h4>
                                    <p>a.n. Karl Fashion</p>
                                    <br>
                                    <p>Jumlah yang harus dibayar:</p>
                                    <h4><?php echo "Rp ".number_format($totalBayar, 0, ",", "."); ?></h4>
                                    <?php
                                 }
                                 elseif($rowData['pembayaran']=='Cash on Delivery')
                                 {
                                    ?>
                                    <p>Metode pembayaran: <strong>Cash on Delivery</strong></p>
                                    <p>Siapkan uang sebesar <strong><?php echo "Rp ".number_format($totalBayar, 0, ",", "."); ?></strong> saat barang diterima.</p>
                                    <?php
                                 }
                                 ?>
                            </div>
                        </div>
                    </div>
                </div>
                        <?php  require_once 'footer.php'; ?>
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