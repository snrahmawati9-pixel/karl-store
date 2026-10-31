<?php 
require_once 'session.php';
if(isset($_POST['submit_Edit']))
{
    $update=mysqli_query($con, "update categori set
                        categori_nama ='".$_POST['categori_nama']."',
                        categori_model ='".$_POST['categori_model']."',
                        categori_status='".$_POST['categori_status']."'
                        where categori_id= '".$_GET['id']."'
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
$data=mysqli_query($con, "select * from categori where categori_id='".$_GET['id']."'");
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
                            <h5><center>Edit Categori <?php echo @$_GET['id'] ?></center></h5>
                            <div class="line"></div>

                            <form action="#" method="post">
                                    <div class="row">
                            
                                         <div class="col-12 mb-3">
                                            <label>Categori</label>
                                            <input type="text" class="form-control" name="categori_nama"  placeholder="Masukan Categori">
                                        </div>

                                         <div class="col-12 mb-3">
                                            <label>Model</label>
                                            <input type="text" class="form-control" name="categori_model" placeholder="Masukan Model">
                                        </div>
                                        
                                        <div class="col-12 mb-3">
                                            <label>Categori Status</label>
                                            <select class="form-control" name="categori_status">
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
                                                &nbsp;&nbsp;
                                                <input type="reset" name="reset"  class="btn karl-btn" value="Reset">
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