<?php 
require_once 'session.php';
if(isset($_POST['submit_Edit']))
{
    $cek = mysqli_query($con, "select categori_nama from categori where categori_id='".$_POST['categori_id']."'");
    $cat = mysqli_fetch_array($cek);

    $update=mysqli_query($con, "update product set
                    categori_id ='".$_POST['categori_id']."',
                    categori_nama ='".$_POST['categori_nama']."',
                    product_nama ='".$_POST['product_nama']."',
                    product_harga ='".$_POST['product_harga']."',
                    product_stok='".$_POST['product_stok']."',
                    product_keterangan='".$_POST['product_keterangan']."',
                    product_status='".$_POST['product_status']."'
                    where product_id= '".$_GET['id']."'
                    ");
    if($update==true)
    {
        $pesan='Update data berhasil';
    }
    else
    {
        $pesan='Update data gagal';
    }
   
}
$data=mysqli_query($con, "select * from product where product_id='".$_GET['id']."'");
$rowData=mysqli_fetch_array($data);
$listCategori=mysqli_query($con, "select distinct categori_nama from categori order by categori_nama asc");
$listModel = mysqli_query($con, "select categori_id, categori_nama, categori_model from categori order by categori_nama asc, categori_model asc");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
        <div id="header">
            <?php include 'header.php'; ?>
        </div>

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
                        <div class="page-heading">
                            <h4><center>Edit Product <?php echo @$_GET['id'] ?></center></h4>
                            <div class="line"></div>

                            <form action="#" method="post">
                                    <div class="row">

                                        <div class="col-12 mb-3">
                                            <label>Categori</label>
                                            <select class="form-control" name="categori_nama">
                                                <?php while($c=mysqli_fetch_array($listCategori)) { ?>
                                                    <option value="<?php echo $c['categori_nama']; ?>" <?php if($c['categori_nama']==$rowData['categori_nama']) echo 'selected'; ?>>
                                                        <?php echo $c['categori_nama']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label>Model</label>
                                            <select class="form-control" name="categori_id">
                                                <?php while($c=mysqli_fetch_array($listModel)) { ?>
                                                    <option value="<?php echo $c['categori_id']; ?>" <?php if($c['categori_id']==$rowData['categori_id']) echo 'selected'; ?>>
                                                        <?php echo $c['categori_nama']; ?> - <?php echo $c['categori_model']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="product_nama" placeholder="Masukan nama" value="<?php echo $rowData['product_nama']; ?>">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label>Product Keterangan</label>
                                            <textarea class="form-control" name="product_keterangan" placeholder="Keterangan"><?php echo $rowData['product_keterangan']; ?></textarea>
                                        </div>

                                         <div class="col-12 mb-3">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="product_harga" placeholder="Rp. " value="<?php echo $rowData['product_harga']; ?>">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label>Stock</label>
                                            <input type="text" class="form-control" name="product_stok" placeholder="Stock">
                                        </div>
                                        
                                        <div class="col-12 mb-3">
                                            <label> Status</label>
                                            <select class="form-control" name="product_status">
                                                <?php 
                                                if($rowData['status']=='active')
                                                {
                                                    ?>
                                                    <option value="active" selected>Active</option>
                                                    <option value="non-active">Non-Active</option>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value="active">Active</option>
                                                    <option value="non-active" selected>Non-Active</option>
                                                    <?php
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                        <?php echo @$pesan; ?>
                                        </div>

                                        <div class="col-md-6">
                                                <input type="submit" name="submit_Edit" class="btn karl-btn" value="Submit">
                                        </div>
                                        
                                        <div class="col-md-6">
                                                <input type="reset" name="reset"  class="btn karl-btn" value="Reset">
                                        </div>
                                    </div>
                                </form>      
                        </div>
                </div>
            </div>
        </section>
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