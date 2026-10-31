<?php 
require_once 'session.php';
if(isset($_POST['submit_Edit']))
{
    $update=mysqli_query($con, "update user set
                        nama = '".$_POST['nama']."',
                        telepon = '".$_POST['telepon']."',
                        alamat = '".$_POST['alamat']."',
                        status = '".$_POST['status']."'
                        where email= '".$_GET['id']."'
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
$data=mysqli_query($con, "select * from user where email='".$_GET['id']."'");
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
                            <h5><center>Edit member <?php echo @$_GET['id'] ?></center></h5>
                            <div class="line"></div>

                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email"  id="email" placeholder="Masukan email" autofocus>
                                        </div>
                                  
                                         <div class="col-12 mb-3">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" id="nama"  placeholder="Masukan nama">
                                        </div>

                                         <div class="col-12 mb-3">
                                            <label>Telepon</label>
                                            <input type="text" class="form-control" name="telepon" id="telepon"  placeholder="Masukan NO HP">
                                        </div>
                                        
                                        <div class="col-12 mb-3">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" name="alamat" id="alamat" placeholder="Masukan alamat"></textarea>
                                        </div>


                                        <div class="col-12 mb-3">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
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