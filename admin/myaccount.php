<?php 
require_once 'session.php';
$data=mysqli_query($con, "select * from user where email='".$_SESSION['snrm9427_ecommerce']."'");
$rowData=mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <?php require_once 'title.php'; ?>
</head>

<body>
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

        <div class="breadcumb_area">
            <div class="container">
                <h2><center>MY ACCOUNT</center></h2><br>
            </div>
        </div>

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <strong>Email</strong><br>
                        <?php echo $rowData['email']; ?>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <strong>Nama</strong><br>
                        <?php echo $rowData['nama']; ?>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <strong>Telepon</strong><br>
                        <?php echo $rowData['telepon']; ?>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <strong>Password</strong><br>
                        ********
                    </div>
                    <div class="col-12 mb-3">
                        <strong>Alamat</strong><br>
                        <?php echo $rowData['alamat']; ?>
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