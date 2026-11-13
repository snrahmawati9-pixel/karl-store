<?php 
require_once 'session.php';
if(isset($_POST['submit_Admin']))
{
    if(empty($_POST['email']))
    {
        $pesan='Email tidak boleh kosong';
    }
    else if(empty($_POST['password']))
    {
        $pesan='Password tidak boleh kosong';
    }
    else if(empty($_POST['nama']))
    {
        $pesan='Nama tidak boleh kosong';
    }
    else if(empty($_POST['alamat']))
    {
        $pesan='Alamat tidak boleh kosong';
    }
    else
    {
        $cekEmail=mysqli_query($con,"select * from user where email='".$_POST['email']."'");
        if(mysqli_num_rows($cekEmail)==0)
        {
            $insert=mysqli_query($con, "insert into user (email, nama, password, telepon, alamat, type, status) values ('".$_POST['email']."','".$_POST['nama']."', '".$_POST['password']."', '".$_POST['telepon']."','".$_POST['alamat']."','administrator', 'active')");

            if($insert==true)
            {
                $pesan='Tambah admin berhasil';
            }
            else
            {
                $pesan='Tambah admin gagal';
            }
        }
        else
        {
            $pesan='Email sudah pernah terdaftar';
        }
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
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body>
   
    <div id="wrapper">
        <div id="header">
            <?php include 'header.php'; ?>
        </div>

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">
                        <div class="page-heading">
                            <h5><center>tambah admin</center></h5>
                            <div class="line"></div>

                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email"  id="email" placeholder="Masukan email" autofocus>
                                        </div>
                                  
                                         <div class="col-12 col-md-6  mb-3">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" id="nama"  placeholder="Masukan nama">
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
                                        </div>

                                         <div class="col-12 col-md-6 mb-3">
                                            <label>Telepon</label>
                                            <input type="text" class="form-control" name="telepon" id="telepon"  placeholder="Masukan NO HP">
                                        </div>
                                        
                                        <div class="col-12 mb-3">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" name="alamat" id="alamat" placeholder="Masukan alamat"></textarea>
                                        </div>

                                        <div class="col-12 mb-3">
                                        <?php echo @$pesan; ?>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="submit" name="submit_Admin" class="btn karl-btn" value="Submit">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="reset" name="reset"  class="btn karl-btn" value="Reset">
                                        </div>
                                    </div>
                                </form>
                        </div>
                </div>
            </div>
            <br>
            <?php include 'footer.php'; ?>
        </section>
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