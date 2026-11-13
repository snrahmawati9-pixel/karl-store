<?php 
require_once 'session.php';
if(empty($_SESSION['snrm9427_ecommerce']))
{
    header("location:login2.php");
    exit;
}
$emailLama=$_SESSION['snrm9427_ecommerce'];
if(isset($_POST['submit_Update']))
{
    $emailBaru=$_POST['email'];

    // cek apakah email baru sudah dipakai akun lain
    $cekEmail=mysqli_query($con, "select * from user where email='".$emailBaru."' and email!='".$emailLama."'");

    if($emailBaru=='')
    {
        $pesan='Email tidak boleh kosong';
    }
    elseif(mysqli_num_rows($cekEmail)>0)
    {
        $pesan='Email sudah dipakai akun lain';
    }
    else
    {
        $update=mysqli_query($con, "update user set
                            email = '".$emailBaru."',
                            nama = '".$_POST['nama']."',
                            telepon = '".$_POST['telepon']."',
                            alamat = '".$_POST['alamat']."'
                            where email = '".$emailLama."'
                            ");
        if($update==true)
        {
            // ikut ubah email di tabel orderku supaya riwayat pesanan tetap terhubung
            $updateOrder=mysqli_query($con, "update orderku set email='".$emailBaru."' where email='".$emailLama."'");
            $_SESSION['snrm9427_ecommerce']=$emailBaru;

            $pesan='Profile berhasil diupdate';
        }
        else
        {
            $pesan='Profile gagal diupdate';
        }
    }
}

// ganti password
if(isset($_POST['submit_Password']))
{
    $cek=mysqli_query($con, "select * from user where email='".$_SESSION['snrm9427_ecommerce']."'");
    $rowCek=mysqli_fetch_array($cek);

    // SESUAIKAN: nama kolom password dan cara menyimpannya (lihat catatan di bawah)
    if($_POST['password_lama']!=$rowCek['password'])
    {
        $pesanPassword='Password lama salah';
    }
    elseif($_POST['password_baru']=='')
    {
        $pesanPassword='Password baru tidak boleh kosong';
    }
    elseif($_POST['password_baru']!=$_POST['password_konfirmasi'])
    {
        $pesanPassword='Konfirmasi password tidak sama';
    }
    else
    {
        $updatePassword=mysqli_query($con, "update user set
                        password = '".$_POST['password_baru']."'
                        where email = '".$_SESSION['snrm9427_ecommerce']."'
                        ");
        if($updatePassword==true)
        {
            $pesanPassword='Password berhasil diubah';
        }
        else
        {
            $pesanPassword='Password gagal diubah';
        }
    }
}

$data=mysqli_query($con, "select * from user where email='".$_SESSION['snrm9427_ecommerce']."'");
$rowData=mysqli_fetch_array($data);
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
            <?php require_once 'categories.php'; ?>
    </div>
   
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
                <h4>My Account</h4><br>
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

                <br><hr><br>

                <h4>Ubah Profil</h4><br>
                <form action="#" method="post">
                    <div class="row">

                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $rowData['email']; ?>" placeholder="Masukan email">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $rowData['nama']; ?>" placeholder="Masukan nama">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo $rowData['telepon']; ?>" placeholder="Masukan NO HP">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukan alamat"><?php echo $rowData['alamat']; ?></textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <?php echo @$pesan; ?>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <input type="submit" name="submit_Update" class="btn karl-btn" value="Update Profile" center>
                        </div>

                    </div> 
                </form>

                <br><hr><br>

                <h4>Ganti Password</h4><br>
                <form action="#" method="post">
                    <div class="row">

                        <div class="col-12 col-md-6 mb-3">
                            <label for="password_lama">Password Lama</label>
                            <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Masukan password lama">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="password_baru">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukan password baru">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="password_konfirmasi">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="password_konfirmasi" id="password_konfirmasi" placeholder="Ulangi password baru">
                        </div>

                        <div class="col-12 mb-3">
                            <?php echo @$pesanPassword; ?>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <input type="submit" name="submit_Password" class="btn karl-btn" value="Ganti Password">
                        </div>

                    </div>
                </form>
            </div>
               <?php require_once 'footer.php'; ?>
        </section>
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