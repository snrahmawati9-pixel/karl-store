<?php 
require_once 'session.php';

$data=mysqli_query($con,"select * from user where email='".$_GET['id']."'");
$rowData=mysqli_fetch_array($data);

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

    <div id="wrapper">
       <div id="header">
            <?php include 'header.php'; ?>
        </div>
            <div class="container">
                <div class="row">
                        <div class="page-heading">
                            <h5><center>data admin</center></h5>
                            <div class="line"></div>

                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Email</label>
                                            <input class="form-control" value="<?php echo $rowData['email'];?>">
                                        </div>
                                  
                                         <div class="col-12 col-md-6  mb-3">
                                            <label>Nama</label>
                                            <input class="form-control" value="<?php echo $rowData['nama'];?>">
                                        </div>

                                         <div class="col-12 col-md-6 mb-3">
                                            <label>Telepon</label>
                                            <input type="text" class="form-control" value="<?php echo $rowData['telepon'];?>">
                                        </div>
                                        
                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Alamat</label>
                                           <textarea class="form-control"><?php echo $rowData['alamat'];?></textarea>
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Status</label>
                                             <input class="form-control" value="<?php echo $rowData['status'];?>">
                                        </div>
                                    </div>
                                </form>

                        </div>
                </div>
            </div>
    </div>

        <?php require_once 'footer.php'; ?>
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
