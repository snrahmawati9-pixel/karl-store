<?php 
require_once 'session.php';

if (!isset($rowUser) || !is_array($rowUser)) {
    $rowUser = array('email' => '', 'alamat' => '', 'telepon' => '');
}

if (!isset($_SESSION['myCart']) || !is_array($_SESSION['myCart'])) {
    $_SESSION['myCart'] = array();
}

if (empty($_SESSION['myCart']) || empty($_SESSION['pengiriman']))
{
    header("location:cart.php");
    exit;
}
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
        
        <div class="checkout_area section_padding_100">
            <div class="container">
                <form action="prosesOrder.php" method="post" id="formCheckout">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-page-heading">
                                <h5>Billing Address</h5>
                                
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label> Name </label>
                                    <input class="form-control" name="nama_penerima" value="<?php echo $rowUser['email'];?>">
                                </div>
                              
                                
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                     <input class="form-control" name="alamat" value="<?php echo $rowUser['alamat']; ?>">
                                    
                                </div>
                
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input  class="form-control" name="telepon" value="<?php echo $rowUser['telepon']; ?>">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input class="form-control" name="email" value="<?php echo $rowUser['email']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <br>
                        <div class="order-details-confirmation">
                            <div class="cart-page-heading">
                                <h5>Your Order</h5>
                                <p>The Details</p>
                            </div>

                            <ul class="order-details-form mb-4">
                                <li><span>Product</span> <span>Total</span></li>
                                <?php 
                                $total = 0;
                                foreach ($_SESSION['myCart'] as $cartKey => $jmlOrder)
                                {
                                   $pecah      = explode('|', $cartKey);
                                   $productId  = $pecah[0];
                                   $ukuranItem = isset($pecah[1]) ? $pecah[1] : '';

                                   $product=mysqli_query($con, "select * from product where product_id = '".$productId."'");
                                   $rowProduct=mysqli_fetch_array($product);

                                   if(!$rowProduct) { continue; }

                                   $subtotal=$jmlOrder*$rowProduct['product_harga'];
                                   $total+=$subtotal;
                                ?>

                                <li>
                                    <span><?php echo $rowProduct['product_nama']; ?><?php if($ukuranItem != '') { echo ' ('.$ukuranItem.')'; } ?> x <?php echo $jmlOrder; ?></span> 
                                    <span><?php echo number_format($subtotal, 0, ",", "."); ?></span>
                                </li>
                                <?php
                                }

                                $ongkir = 0;
                                $namaPengiriman = '';
                                $kirim=mysqli_query($con, "select * from pengiriman where pengiriman_id='".$_SESSION['pengiriman']."' and pengiriman_status='active'");
                                $rowKirim=mysqli_fetch_array($kirim);
                                if($rowKirim)
                                {
                                    $ongkir = $rowKirim['pengiriman_harga'];
                                    $namaPengiriman = $rowKirim['pengiriman_nama'];
                                }
                                $grandTotal = $total + $ongkir;
                                ?>
                                <li><span>Subtotal</span> <span><?php echo number_format($total, 0, ",", "."); ?></span></li>
                                <li><span>Shipping (<?php echo $namaPengiriman; ?>)</span> <span><?php echo ($ongkir > 0) ? number_format($ongkir, 0, ",", ".") : "Free"; ?></span></li>
                                <li><span>Total</span> <span><?php echo number_format($grandTotal, 0, ",", "."); ?></span></li>
                            </ul>

                            <div class="mb-4">

                                <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="bayar1" name="pembayaran" value="Cash on Delivery" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="bayar1">Cash on Delivery</label>
                                </div>

                                <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="bayar2" name="pembayaran" value="Direct Bank Transfer" class="custom-control-input">
                                    <label class="custom-control-label" for="bayar2">Direct Bank Transfer</label>
                                </div>

                                <div id="pilihBank" style="display:none;" class="ml-4">
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="bank1" name="bank" value="Bank Mandiri" class="custom-control-input">
                                        <label class="custom-control-label" for="bank1">Mandiri</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="bank2" name="bank" value="BCA" class="custom-control-input">
                                        <label class="custom-control-label" for="bank2">BCA</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="bank3" name="bank" value="BNI" class="custom-control-input">
                                        <label class="custom-control-label" for="bank3">BNI</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-2">
                                        <input type="radio" id="bank4" name="bank" value="BRI" class="custom-control-input">
                                        <label class="custom-control-label" for="bank4">BRI</label>
                                    </div>
                                    <p id="infoRekening" class="mt-3"></p>
                                </div>

                            </div>

                            <input type="submit" name="prosesOrder" class="btn karl-checkout-btn" value="Place Order">
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <br>
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

    <script>
    $(function () {
        // nomor rekening tiap bank
        var rekening = {
            'Bank Mandiri': 'Mandiri - 1234567890123 a.n. Karl Fashion',
            'BCA'         : 'BCA - 1234567890 a.n. Karl Fashion',
            'BNI'         : 'BNI - 123456789012 a.n. Karl Fashion',
            'BRI'         : 'BRI - 123456789012345 a.n. Karl Fashion'
        };

        // tampilkan atau sembunyikan daftar bank
        $('input[name="pembayaran"]').on('change', function () {
            if ($('#bayar2').is(':checked')) {
                $('#pilihBank').show();
            } else {
                $('#pilihBank').hide();
                $('input[name="bank"]').prop('checked', false);
                $('#infoRekening').text('');
            }
        });

        // tampilkan nomor rekening sesuai bank yang dipilih
        $('input[name="bank"]').on('change', function () {
            $('#infoRekening').text(rekening[$(this).val()] || '');
        });

        // transfer bank wajib pilih bank
        $('#formCheckout').on('submit', function (e) {
            if ($('#bayar2').is(':checked') && !$('input[name="bank"]:checked').length) {
                e.preventDefault();
                alert('Pilih bank tujuan transfer dulu');
            }
        });
    });
    </script>

</body>

</html>