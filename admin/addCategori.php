<?php 
require_once 'session.php';
if (isset($_POST['submit_Categori']))
{
    $getLastId=mysqli_query($con, "select * from categori order by categori_id desc");
    if(mysqli_num_rows($getLastId)==0)
    {
        $id='C1001';
    }
    else
    {
        //sudah ada data
        $rowGetLastId=mysqli_fetch_array($getLastId);
        $getId=substr($rowGetLastId['categori_id'],-4)+1;
        $id='C'.$getId;

    }
    
    $insert=mysqli_query($con, "insert into categori (categori_id, categori_nama, categori_model, categori_status) values ('".$id."','".$_POST['categori_nama']."', '".$_POST['categori_model']."', '".$_POST['categori_status']."')");

    if($insert==true)
    {
        header("location:categori.php");
    }
    else
    {
        $pesan = 'Tambah categori gagal';
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
   
    <div id="wrapper">
        <div id="header">
            <?php include 'header.php'; ?>
        </div>
            <div class="container">
                <div class="row">
                        <div class="page-heading">
                            <h5><center>tambah categori</center></h5>
                            <div class="line"></div>

                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="email">Categori</label>
                                            <input type="text" class="form-control" name="categori_nama" placeholder="Tambah Categori" autofocus>
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="email">Model</label>
                                            <input type="text" class="form-control" name="categori_model" placeholder="Tambah Model">
                                        </div>
                                  
                                         <div class="col-12 col-md-6 mb-3">
                                            <label for="nama">Status</label>
                                            <select class="form-control" name="categori_status">
                                                <option value="active">Active</option>
                                                <option value="non-active">Non-active</option>
                                                 </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                        <?php echo @$pesan; ?>
                                        </div>

                                         <div class="col-md-6">
                                                <input type="submit" name="submit_Categori" class="btn karl-btn" value="Submit Categori">
                                                &nbsp;&nbsp;
                                                <input type="reset" name="reset"  class="btn karl-btn" value="Reset">
                                        </div>
                                    </div>
                                </form>

                            </div>
                </div>
            </div>
    </div>

    <div id="footer">
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