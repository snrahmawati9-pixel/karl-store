<?php 
require_once 'session.php';
if(isset($_POST['addtocart']))
{
    $id     = $_GET['id'];
    $jumlah = $_POST['jmlOrder'];
    $ukuran = isset($_POST['ukuran']) ? $_POST['ukuran'] : '';

    // kunci = id|ukuran, jadi ukuran beda = baris beda
    $key = $id.'|'.$ukuran;

    if(isset($_SESSION['myCart'][$key]))
    {
        $_SESSION['myCart'][$key] += $jumlah;
    }
    else
    {
        $_SESSION['myCart'][$key] = $jumlah;
    }
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
         <?php  require_once 'categories.php'; ?>
    </div>

    <div id="wrapper">

        <?php require_once 'header.php'; ?>
        
        <section class="top-discount-area d-md-flex align-items-center">
            <div class="single-discount-area">
            </div>
            <div class="single-discount-area">
                <h5>Free Shipping &amp; Returns</h5>
            </div>
            <div class="single-discount-area">
            </div>
        </section>

        <div class="breadcumb_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- btn -->
                        <a href="index.php" class="backToHome d-block"><i class="fa fa-angle-double-left"></i> Back to Home</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">

                    <?php 
                        $data=mysqli_query($con, "select * from product where product_id='".@$_GET['id']."'");
                        $rowData=mysqli_fetch_array($data);
                    ?>
                    <div class="col-12 col-md-6">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="product/<?php echo $rowData['product_gambar']?>">
                                        <img class="d-block w-100" img src="product/<?php echo $rowData['product_gambar']?>" alt="First slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">

                            <h4 class="title"><?php echo $rowData['product_nama']; ?></h4>

                            <h4 class="price"><?php echo "Rp ".number_format($rowData['product_harga'], 0, ",", "."); ?></h4>

                            <p class="available">Available: <span class="text-muted"><?php echo $rowData['product_stok']; ?></span></p>

                            <div class="single_product_ratings mb-15">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>

                            <?php
                                $ukuranDefault = array(
                                    'C1001' => 'S,M,L,XL',
                                    'C1002' => 'S,M,L,XL',
                                    'C1003' => 'S,M,L,XL',
                                    'C1004' => 'S,M,L,XL',
                                    'C1009' => '36,37,38,39,40,41',
                                    'C1010' => '36,37,38,39,40,41',
                                    'C1011' => '36,37,38,39,40,41'
                                );

                                $cid = $rowData['categori_id'];
                                $pakaiUkuran = isset($ukuranDefault[$cid]);

                                if($pakaiUkuran)
                                {
                                    $ukuranStr = !empty($rowData['product_ukuran']) ? $rowData['product_ukuran'] : $ukuranDefault[$cid];
                                    $listUkuran = array_map('trim', explode(',', $ukuranStr));
                                }
                              ?>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix mb-50" method="post" id="formCart">
                              <?php if($pakaiUkuran) { ?>
                                <div class="widget size mb-50">
                                    <h6 class="widget-title">Size</h6>
                                    <div class="widget-desc">
                                        <ul>
                                            <?php foreach($listUkuran as $u) { ?>
                                                <li><a href="#" class="pilih-ukuran" data-ukuran="<?php echo htmlspecialchars($u); ?>"><?php echo htmlspecialchars($u); ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <input type="hidden" name="ukuran" id="inputUkuran" value="">
                              <?php } ?>

                                <div class="d-flex">
                                    <select name="jmlOrder" class="quantity">
                                        <?php
                                        $start=1;
                                        while($start<=$rowData['product_stok'])
                                        {
                                        ?>
                                            <option value="<?php echo $start;?>"><?php echo $start; ?></option>
                                        <?php
                                            $start++;
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="addtocart" class="btn cart-submit d-block" value="Add to cart">Add to cart</button>
                                </div>
                            </form>

                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Information</a>
                                        </h6>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p><?php echo $rowData['product_keterangan']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">shipping &amp; Returns</a>
                                        </h6>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <h6>Shipping Information</h6>
                                            <p>We deliver your favorite fashion items directly
                                                to your doorstep. Orders will be processed and
                                                shipped to the address provided during checkout.</p>

                                            <ul>
                                              <li>Shipping costs depend on the delivery destination.</li>
                                              <li>Delivery time depends on the location and courier service.</li>
                                              <li>Please ensure your shipping address is correct.</li>
                                          </ul>
                                            <br>
                                            <h6>Return Policy</h6>
                                            <p>If you receive a damaged or incorrect item, you may request a return or exchange within 7 days of receiving the product.</p>

                                            <ul>
                                                <li>Items must be unused and in their original condition.</li>
                                                <li>Proof of purchase is required.</li>
                                                <li>Returns are subject to product inspection and approval.</li>
                                            </ul>
                                            <br>
                                            <p>For further assistance, please contact our customer service team.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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

    <script>
        $(function () {
            $('.pilih-ukuran').on('click', function (e) {
                e.preventDefault();
                $('.pilih-ukuran').removeClass('active');
                $(this).addClass('active');
                $('#inputUkuran').val($(this).data('ukuran'));
            });

            $('#formCart').on('submit', function (e) {
                if ($('#inputUkuran').length && $('#inputUkuran').val() === '') {
                    e.preventDefault();
                    alert('Pilih ukuran terlebih dahulu');
                }
            });
        });
    </script>

</body>

</html>