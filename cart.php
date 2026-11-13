<?php 
require_once 'session.php';
if(empty($_SESSION['snrm9427_ecommerce']))
{
    header("location:login2.php");
}

if(@$_GET['do']=='hapus')
{
    unset($_SESSION['myCart'][$_GET['id']]);
    if(empty($_SESSION['myCart']))
    {
        unset($_SESSION['myCart']);
        unset($_SESSION['myUkuran']);
        unset($_SESSION['pengiriman']);
    }
    header("location:cart.php");
    exit;
}

if(@$_GET['do']=='clear')
{
    unset($_SESSION['myCart']);
    unset($_SESSION['myUkuran']);
    unset($_SESSION['pengiriman']);
    header("location:cart.php");
    exit;
}

if(isset($_POST['pengiriman_id']))
{
    $_SESSION['pengiriman'] = $_POST['pengiriman_id'];
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
        <?php require_once 'categories.php'; ?>
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
       
        <div class="cart_area section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <?php 
                                // total dimulai dari 0 di sini, karena header.php juga memakai $total
                                $total = 0;
                                if(!empty($_SESSION['myCart']) && is_array($_SESSION['myCart']))
                                {
                                    foreach ($_SESSION['myCart'] as $cartKey => $jmlOrder)
                                    {
                                    $pecah      = explode('|', $cartKey);
                                    $productId  = $pecah[0];
                                    $ukuranItem = isset($pecah[1]) ? $pecah[1] : '';

                                    $product=mysqli_query($con, "select * from product where product_id = '".$productId."'");
                                    $rowProduct=mysqli_fetch_array($product);
                                    
                                    if(!$rowProduct) { continue; }
                                ?>
                                <tbody>
                                    <tr>
                                        <td class="cart_product_img d-flex align-items-center">
                                            <a href="#"><img src="product/<?php echo $rowProduct['product_gambar']?>" alt="Product"></a>
                                            
                                            <h6><?php echo $rowProduct['product_nama']?></h6>
                                        </td>
                                        <td class="size"><span><?php echo ($ukuranItem != '') ? $ukuranItem : '-'; ?></span></td>
                                        <td class="price"><span><?php echo "Rp ".number_format($rowProduct['product_harga'], 0, ",", "."); ?></span></td>
                                            
                                        <td class="qty">
                                            <div class="quantity" align="center">
                                               <span class="qty-minus"></span>
                                                <input  class="qty-text" value="<?php echo $jmlOrder; ?>" readonly>
                                                <span class="qty-plus"></span>
                                            </div>
                                        </td>
                                            <?php 
                                            $subtotal=$jmlOrder*$rowProduct['product_harga'];
                                            $total+=$subtotal;
                                            ?>
                                    <td class="total_price"><span><?php echo "Rp ". number_format(@$subtotal, 0, ",", "."); ?></span>
                                        <br><a href="cart.php?do=hapus&id=<?php echo urlencode($cartKey); ?>"><small>Hapus</small></a>
                                    </td>
                                    </tr>
                                </tbody>
                                 <?php
                                    } 
                                } 
                            ?>
                            </table>
                        </div>

                        <div class="cart-footer d-flex mt-30">
                            <div class="back-to-shop w-50">
                                <a href="product.php">Continue shooping</a>
                            </div>
                            <div class="update-checkout w-50 text-right">
                                <a href="cart.php?do=clear">clear cart</a>
                                
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                // ongkir dihitung setelah $total terisi dari loop di atas
                $ongkir = 0;
                $adaPengiriman = false;
                if($total > 0 && !empty($_SESSION['pengiriman']))
                {
                    $kirim=mysqli_query($con, "select * from pengiriman where pengiriman_id='".$_SESSION['pengiriman']."' and pengiriman_status='active'");
                    $rowKirimDipilih=mysqli_fetch_array($kirim);
                    if($rowKirimDipilih)
                    {
                        $ongkir = $rowKirimDipilih['pengiriman_harga'];
                        $adaPengiriman = true;
                    }
                }
                $grandTotal = $total + $ongkir;
                ?>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="coupon-code-area mt-70">
                            <div class="cart-page-heading">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="shipping-method-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Shipping method</h5>
                                <p>Select the one you want</p>
                            </div>
                            <form action="cart.php" method="post">
                            <?php 
                            $dataKirim = mysqli_query($con, "select * from pengiriman where pengiriman_status='active'");
                            while($rowKirim = mysqli_fetch_array($dataKirim))
                            {
                            ?>
                                <div class="custom-control custom-radio mb-30">
                                    <input type="radio" id="kirim<?php echo $rowKirim['pengiriman_id']; ?>" name="pengiriman_id" value="<?php echo $rowKirim['pengiriman_id']; ?>" class="custom-control-input" onchange="this.form.submit()" <?php if(@$_SESSION['pengiriman']==$rowKirim['pengiriman_id']) echo 'checked'; ?>>

                                    <label class="custom-control-label d-flex align-items-center justify-content-between" for="kirim<?php echo $rowKirim['pengiriman_id']; ?>">
                                        <span><?php echo $rowKirim['pengiriman_nama']; ?></span>
                                        <span><?php echo ($rowKirim['pengiriman_harga'] > 0) ? "Rp ".number_format($rowKirim['pengiriman_harga'], 0, ",", ".") : "Free"; ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-total-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Cart total</h5>
                                <p>Final info</p>
                            </div>
                            <ul class="cart-total-chart">
                                <li><span>Subtotal</span> <span><?php echo "Rp ". number_format($total, 0, ",", "."); ?></span></li>
                                <li><span>Shipping</span> <span><?php 
                                    if($adaPengiriman==false)
                                    {
                                        echo "-";
                                    }
                                    elseif($ongkir > 0)
                                    {
                                        echo "Rp ". number_format($ongkir, 0, ",", ".");
                                    }
                                    else
                                    {
                                        echo "Free";
                                    }
                                ?></span></li>
                                <li><span><strong>Total</strong></span> 

                                    <span><strong><?php echo "Rp ". number_format($grandTotal, 0, ",", "."); ?></strong></span></li>
                            </ul>
                            <a href="<?php echo ($total > 0 && $adaPengiriman) ? 'checkout.php' : '#'; ?>" class="btn karl-checkout-btn" <?php if($total == 0 || $adaPengiriman==false) { ?>onclick="alert('Pilih produk dan metode pengiriman dulu'); return false;"<?php } ?>>Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <br>
                <?php require_once 'footer.php'; ?>
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