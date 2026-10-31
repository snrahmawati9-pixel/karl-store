<?php
session_start();
require_once 'koneksi.php';
if (isset($_POST['submit_Login'])) 
{
    if ($_POST['email']=="") 
    {
        $pesan='Email tidak boleh kosong';
    }
    else if($_POST['password']=='') 
    {
        $pesan='Password tidak boleh kosong';
    }
    else
    {
        $data=mysqli_query($con, "select * from user where email ='".$_POST['email']."' and password ='".$_POST['password']."'");

        if (mysqli_num_rows($data)==1) 
        {
            $rowData=mysqli_fetch_array($data);
            if ($rowData['status']=='active') 
            {
                $_SESSION['snrm9427_ecommerce']=$_POST['email'];
                $update=mysqli_query($con, "update user set session_id ='".session_id()."' where email='".$_POST['email']."'");
                if($rowData['type']=='administrator') 
                {
                    header("location:admin/product.php");
                }
                else
                {
                    header("location:index.php");
                }
            }
            else
            {
                $pesan='User anda sudah tidak active';
            }
        }
        else
        {
            $pesan = 'Email / Password Salah';
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
            <div class="container">
                <div class="row">
                        <div class="page-heading">
                            <h5><center>Please Login your account</center></h5>
                                <div class="line" align="center"></div>
    
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 mb-3"">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email"  id="email" value="<?php echo @$_POST['email'];?>" placeholder="Masukan email" autofocus>
                                        </div>
                                    
                                        <div class="col-12 mb-3">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
                                        </div>

                                                <?php
                                                    if(!empty($pesan))
                                                    {
                                                        ?>
                                                        <div class="col-md-6 mb-3">
                                                            <?php echo @$pesan; ?>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>    

                                         <div class="col-md-6 mb-3">
                                                <input type="submit" name="submit_Login" class="btn karl-btn" value="Login">
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