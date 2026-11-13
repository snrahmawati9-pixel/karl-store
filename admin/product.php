<?php 
require_once 'session.php';
if(isset($_GET['id']))
{
    $delete=mysqli_query($con, "delete from product where product_id = '".$_GET['id']."'");
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

            <div class="container">
                <div class="page-heading">
                        <h4><center>Data Product</center></h4>
                    <div class="tambah">
                        <a href="addProduct.php"><center>Tambah Product</center></a>
                     </div>
                     <div id="search" align="right">
                        <form method="post" action="product.php?page=1">
                            <input type="text" name="keyword" id="keyword" value="<?php echo @$_POST['keyword'] ?>" />
                            &nbsp;&nbsp;
                            <input type="submit" name="submitSearch" class="search" value="Search" />
                        </form>
                    </div>
                </div>
               
                <div class="line"></div>
               
                    <table class="dataField">
                            <tr class="bgJudul judulData">
                                <td width="50"></td>
                                <td width="60">No</td>
                                <td width="100">Gambar</td>
                                <td>Product Id</td>
                                <td>Categori Id</td>
                                <td>Kategori</td>
                                <td>Model</td>
                                <td>Nama</td>
                                <td>Harga</td>
                                <td>Stock</td>
                                <td>Status</td>
                            </tr>
                            <?php 
                            $a=1;
                            if(empty($_GET['page']))
                            {
                                $_GET['page']=1;
                            }
             
                            $hal=($_GET['page']*5)-5;
                            $k = mysqli_real_escape_string($con, @$_REQUEST['keyword']);
                            $where = "where a.product_nama like '%$k%' or a.product_id like '%$k%' or b.categori_nama like '%$k%' or b.categori_model like '%$k%'";
                            $data=mysqli_query($con, "select * from product a left join categori b on a.categori_id=b.categori_id $where order by a.product_id desc limit $hal,5");
                                                        
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
                                        <a href="editProduct.php?id=<?php echo $rowData['product_id']?>">
                                            <img src="img/edit.png" height="15">
                                        </a>
                                        &nbsp;&nbsp;
                                        <img src="img/delete.png" height="15" onclick="getDeleteProduct('<?php echo $rowData['product_id'] ?>')" class="kursor">
                                    </td>
                                    <td><?php echo $a; ?></td>
                                    <td>
                                        <img src="../product/<?php echo $rowData['product_gambar']; ?>?v=<?php echo @filemtime('../product/'.$rowData['product_gambar']); ?>" width="100">
                                    </td>
                                    <td>
                                         <a href="dataProduct.php?id=<?php echo $rowData['product_id']; ?>">
                                        <?php echo ucwords($rowData['product_id']); ?>
                                        </a>
                                    </td>

                                     <td>
                                        <?php echo $rowData['categori_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $rowData['categori_nama']; ?>
                                    </td>

                                     <td>
                                        <?php echo $rowData['categori_model']; ?>
                                    </td>

                                    
                                    <td>
                                        <?php echo $rowData['product_nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo "Rp ".number_format($rowData['product_harga'], 0, ",", "."); ?>
                                    </td>
                                    <td>
                                        <?php echo $rowData['product_stok']; ?>
                                    </td>
                                    <td>
                                        <?php echo $rowData['product_status']; ?>
                                    </td>
                                </tr>
                                <?php
                                $a++;
                            }
                            ?>
                        </table>
                        <?php 
                        $getData=mysqli_query($con, "select * from product");
                        $jmlData=mysqli_num_rows($getData);
                        // round = pembulatan biasa
                        // floor = pembulatan kebawah
                        // ceil  = pembulatan keatas
                        $jmlHal=ceil($jmlData/5);
                        ?>
                        <div id="page">
                            <?php
                            if($_GET['page']>1)
                            {
                            ?>
                        
                                <a href="product.php?page=<?php echo $_GET['page']-1;?>">
                                <div class="page_border"> Prev </div>
                                </a>
                            <?php 
                            }
                
                            $start=1;
                            while($start<=$jmlHal)
                            {
                                if ($start==$_GET['page'])
                                {
                                    ?>
                                    <a href="product.php?page=<?php echo $start;?>">
                                        <div class="page_border page_selected"><?php echo $start;?></div>
                                    </a>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <a href="product.php?page=<?php echo $start;?>">
                                        <div class="page_border"><?php echo $start;?></div>
                                    </a>
                                    <?php
                                }
                                
                                $start++;
                            }

                            if($_GET['page']<$jmlHal)
                            {
                            ?>
                                <a href="product.php?page=<?php echo $_GET['page']+1;?>">
                                <div class="page_border"> Next </div>
                                </a>

                            <?php 
                            }
                            ?>
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