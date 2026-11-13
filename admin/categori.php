<?php

require_once 'session.php';
if (isset($_GET['id']))
{
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $delete = mysqli_query($con, "delete from categori where categori_id='$id'");
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
    <script type="text/javascript" src="js/java.js"></script>
</head>

<body>
    
    <div id="wrapper">
        <div id="header">
            <?php include 'header.php'; ?>
        </div>
        
        <section class="top-discount-area d-md-flex align-items-center">
            <div class="single-discount-area">
            </div>
            <div class="single-discount-area">
            </div>
            <div class="single-discount-area">
            </div>
        </section>

        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                        <div class="page-heading">
                            <h4><center>Data Categori</center></h4>
                                <div class="tambah">
                                     <a href="addCategori.php"><center>Tambah Categori</center></a>
                                
                                </div>

                                <div id="search" align="right">
                                    <form method="post" action="#">
                                        <input type="text" name="keyword" id="keyword" value="<?php echo @$_POST['keyword'] ?>" />
                                        &nbsp;&nbsp;
                                        <input type="submit" name="submitSearch" class = "search" value="Search" />
                                    </form>
                                </div>

                                 <div class="line" align="center"></div>
                           
                                <table class="dataField">
                                    <tr class="bgJudul judulData">
                                        <td width="50"></td>
                                        <td width="60">No</td>                   
                                        <td>Id</td>
                                        <td>Categori</td>
                                        <td>Model</td>
                                        <td>Status</td>
                                    </tr>
                                    <?php 
                                    $a=1;
                                                       
                                    $k = mysqli_real_escape_string($con, @$_REQUEST['keyword']);
                                    $data=mysqli_query($con, "select * from categori where categori_nama like '%$k%' or categori_id like '%$k%' or categori_model like '%$k%' order by categori_id asc");     
                                    while ($rowData=mysqli_fetch_array($data))
                                    {
                                        if ($a%2 ==0)
                                        {
                                            $cssbg='genap';
                                        }
                                        else
                                        {
                                            $cssbg='ganjil';
                                        }
                                        ?>
                                        <tr class="<?php echo $cssbg;?>">
                                            <td>
                                                <a href="editCategori.php?id=<?php echo $rowData['categori_id']?>">
                                                    <img src="img/edit.png" height="15">
                                                </a>
                                                &nbsp;&nbsp;
                                                <img src="img/delete.png" height="15" onclick="getDeleteCategori('<?php echo $rowData['categori_id'];?>')" class="kursor">
                                            </td>
                                            <td><?php echo $a; ?></td>
                                            <td>
                                                <a href="dataCategori.php?id=<?php echo $rowData['categori_id']; ?>">
                                                <?php echo ucwords($rowData['categori_id']); ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $rowData['categori_nama']; ?>
                                            </td>
                                             <td>
                                                <?php echo $rowData['categori_model']; ?>
                                            </td>
                                            <td>
                                                <?php echo strtoupper($rowData['categori_status']); ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $a++;
                                    }
                                    ?>
                                </table>
                         </div>     
                 </div>
        </section>
         <?php include 'footer.php';?>
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