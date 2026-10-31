<?php 
require_once 'session.php';
if(isset($_POST['addtocart']))
{
	$_SESSION['myCart'][$_GET['id']]=$_POST['jmlOrder'];
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
              <?php  require_once 'categories.php'; ?>
  </div>
   

  <div id="wrapper">
      <?php require_once 'header.php'; ?>
      

    <div class="breadcumb_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
            
                        <a href="index.php" class="backToHome d-block"><i class="fa fa-angle-double-left"></i> Back to Home</a>
                    </div>
                </div>
                <h2><center>Product Details</center></h2><br>
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

                                 

                                  <!-- Add to Cart Form -->
                                  <form class="cart clearfix mb-50 d-flex" method="post">
                                                <select name="jmlOrder" class="quantity">
                                                <?php
                                                $start=1;
                                                while($start<=$rowData['product_stok'])
                                                {
                                                      ?>
                                                      <option value="<?php echo $start;?>">
                                                            <?php echo $start; ?>
                                                      </option>
                                                      <?php
                                                      $start++;
                                                }
                                                ?>
                                          </select>
                                      <button type="submit" name="addtocart" class="btn cart-submit d-block" value="Add to cart">Add to cart</button>
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
                                              </div><!-- /card-body -->
                                          </div><!-- /collapseOne -->
                                      </div><!-- /card -->
                                  </div><!-- /accordion -->

                              </div><!-- /single_product_desc -->
                        </div><!-- /col-md-6 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>

    <?php require_once 'footer.php'; ?>
</div><!-- /wrapper -->

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>

</body>
</html>
