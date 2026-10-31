<?php 
require_once 'session.php';
if (isset($_POST['submit_Product']))
{
    $cekId=mysqli_query($con, "select * from product where substr(product_id,2,2)='".date("y")."' and substr(product_id,4,2)='".date("m")."' order by product_id desc");
    if(mysqli_num_rows($cekId)==0)
    {
        $id='P'.date("ym").'1001';
    }
    else
    {
        $rowCekId=mysqli_fetch_array($cekId);
        $getId=substr($rowCekId['product_id'],-4)+1;
        $id='P'.date("ym").$getId;
    }

    $folderTujuan='../product/';
    @$ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    $namaFile=$id.'.'.$ext;
    move_uploaded_file(@$_FILES['gambar']['tmp_name'], $folderTujuan.$namaFile);

    $insert=mysqli_query($con, "insert into product (product_id, categori_id, product_nama, product_keterangan, product_harga, product_stok, product_gambar, product_status) values ('".$id."','".$_POST['categori_id']."','".$_POST['product_nama']."','".$_POST['product_keterangan']."','".$_POST['product_harga']."','".$_POST['product_stok']."','".$namaFile."','".$_POST['product_status']."')");

    if($insert==true)
    {
        $pesan="Tambah product berhasil";
    }
    else
    {
        $pesan='Tambah product gagal';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body>
   
  
        <div id="header">
            <?php include 'header.php'; ?>
        </div>
            <div class="container">
                <div class="row">
                        <div class="page-heading">
                            <h5><center>tambah product</center></h5>
                            <div class="line"></div>

                            <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label >Categori</label>
                                            <select class="form-control" name="categori_id">
                                                <option value="">-------------</option>
                                                <?php
                                                    $categori=mysqli_query($con, "select * from categori where categori_status='active'");
                                                    while ($rowCategori=mysqli_fetch_array($categori))
                                                    {
                                                        ?>
                                                        <option value="<?php echo $rowCategori['categori_id'];?>">
                                                            <?php echo $rowCategori['categori_nama']; ?>
                                                        </option>
                                                        <?php    
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label >Model</label>
                                            <select class="form-control" name="categori_id">
                                                <option value="">-------------</option>
                                                <?php
                                                    $categori=mysqli_query($con, "select * from categori where categori_status='active'");
                                                    while ($rowCategori=mysqli_fetch_array($categori))
                                                    {
                                                        ?>
                                                        <option value="<?php echo $rowCategori['categori_id'];?>">
                                                            <?php echo $rowCategori['categori_model']; ?>
                                                        </option>
                                                        <?php    
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                       
                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Product Nama</label>
                                            <input type="text" class="form-control" name="product_nama" placeholder="product nama">
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Product Keterangan</label>
                                            <textarea class="form-control" name="product_keterangan"></textarea>
                                            
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="product_harga">
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Stock</label>
                                            <input type="text" class="form-control" name="product_stok">
                                        </div>


                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Gambar</label>
                                           <input type="file" class="form-control" name="gambar">
                                        </div>

                                         <div class="col-12 col-md-6 mb-3">
                                            <label>Status</label>
                                            <select class="form-control" name="product_status">
                                                <option value="active">Active</option>
                                                <option value="non-active">Non-active</option>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                        <?php echo @$pesan; ?>
                                        </div>

                                         <div class="col-md-6">
                                                <input type="submit" name="submit_Product" class="btn karl-btn" value="Submit Product">
                                                &nbsp;&nbsp;
                                                <input type="reset" name="reset"  class="btn karl-btn" value="Reset">
                                        </div>
                                    </div>
                                </form>
        
                        </div>
                </div>
            </div>
   

    <div id="footer.php">
        <?php include 'footer.php'; ?>
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