<?php
session_start();
require_once 'koneksi.php';
if (isset($_POST['submit_Forget'])) 
{
    if ($_POST['email']=="") 
    {
        $pesan='Email tidak boleh kosong';
    }
    else if($_POST['telepon']=='') 
    {
        $pesan='Telepon tidak boleh kosong';
    }
    else if($_POST['password']=='') 
    {
        $pesan='Password baru tidak boleh kosong';
    }
    else if($_POST['password']!=$_POST['konfirmasi']) 
    {
        $pesan='Konfirmasi password tidak sama';
    }
    else
    {
        $data=mysqli_query($con, "select * from user where email ='".$_POST['email']."' and telepon ='".$_POST['telepon']."'");

        $update=mysqli_query($con, "update user set password ='".$_POST['password']."' where email='".$_POST['email']."'");
            if ($update)
            {
                $sukses='Password berhasil diganti, silakan login';
            }
            else
            {
                $pesan='Gagal: '.mysqli_error($con);
            }
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
            <?php  require_once 'categories.php'; ?>
    </div>
   
    <div id="wrapper">
        <?php require_once 'header.php'; ?>

        <div class="breadcumb_area">
            <div class="container">
                <h2><center>FORGET YOUR PASSWORD</center></h2><br>
            </div>
        </div>

    <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">
                        <div class="page-heading">
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email" value="<?php echo @$_POST['email'];?>" placeholder="Masukan email" autofocus>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo @$_POST['telepon'];?>" placeholder="Masukan telepon">
                                        </div>
                                    
                                        <div class="col-12 mb-3">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password baru">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="konfirmasi">Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="konfirmasi" id="konfirmasi" placeholder="Ulangi password baru">
                                        </div>

                                                <?php
                                                    if(!empty($pesan))
                                                    {
                                                        ?>
                                                        <div class="col-12 mb-3 text-danger">
                                                            <?php echo @$pesan; ?>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>

                                                <?php
                                                    if(!empty($sukses))
                                                    {
                                                        ?>
                                                        <div class="col-12 mb-3 text-success">
                                                            <b><?php echo @$sukses; ?></b>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>

                                        <div class="col-6 mb-2">
                                            <input type="submit" name="submit_Forget" class="btn karl-btn" style="width:100%;" value="Ubah Password">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <a href="login.php" class="btn karl-btn" style="width:100%;">Kembali ke Login</a>
                                        </div>
                                     </div>
                                </form>
                        </div>
                    </div>
                </div>
        </section>
         <?php require_once 'footer.php'; ?>
    </div> 
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