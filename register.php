<?php 
//cek tombol sudah diklik atau belum
if (isset($_POST['submit_Register'])) 
{
    //koneksi
    require_once 'koneksi.php';

    @$cek_Email=mysqli_query($con, "select * from user where email='".$_POST['email']."'");

    if (mysqli_num_rows($cek_Email)==0) 
    {
        $insert=mysqli_query($con, "insert into user (email, nama, password, telepon, alamat, type, status) values ('".$_POST['email']."','".$_POST['nama']."','".$_POST['password']."','".$_POST['telepon']."','".$_POST['alamat']."','member','active')");
        if ($insert==true) 
        {
            $pesan='Register berhasil';
        }

        else
        {
            $pesan='Register gagal';
        }
    }
    else
    {
        $pesan='Email sudah pernah terdaftar';
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
            <div class="container">
                <div class="row">
                        <div class="page-heading">
                            <h5><center>please complate this form for LOGIN</center></h5>
                            <div class="line"></div>

                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email"  id="email" placeholder="Masukan email" autofocus>
                                        </div>
                                  
                                         <div class="col-12 col-md-6  mb-3">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" id="nama"  placeholder="Masukan nama">
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
                                        </div>

                                         <div class="col-12 col-md-6 mb-3">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" name="telepon" id="telepon"  placeholder="Masukan NO HP">
                                        </div>
                                        
                                        <div class="col-12 mb-3">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" name="alamat" name="alamat" id="alamat" placeholder="Masukan alamat"></textarea>
                                        </div>

                                        <div class="col-12 mb-3">
                                        <?php echo @$pesan; ?>
                                        </div>

                                         <div class="col-md-6 mb-3">
                                                <input type="submit" name="submit_Register" class="btn karl-btn" value="Submit">
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