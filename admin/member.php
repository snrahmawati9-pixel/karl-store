<?php 
require_once 'session.php';
if(isset($_GET['id']))
{
    $delete=mysqli_query($con, "delete from user where email = '".$_GET['id']."'");
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

            <div class="container">
                <div class="page-heading">
                        <h4><center>DATA MEMBER</center></h4>
                    <div class="tambah">
                        <a href="addMember.php"><center>Tambah Member</center></a>
                      

                         <div id="search" align="right">
                            <form method="post" action="#">
                             <input type="text" name="keyword" id="keyword" value="<?php echo @$_POST['keyword'] ?>" />
                                 &nbsp;&nbsp;
                            <input type="submit" name="submitSearch" class="search" value="Search">
                            </form>
                        </div>
                     </div>
                
                <div class="line"></div>
                </div>

          
                <table class="dataField">
                    <tr class="bgJudul judulData page-heading ">
                        <td width="50"></td>
                        <td width="40"><h5>No</h5></td>
                        <td><h5>Nama</h5></td>
                        <td><h5>Email</h5></td>
                        <td><h5>Status</h5></td>
                    </tr>
                    <?php 
                    $a=1;
                    if(isset($_POST['submitSearch']))
                    {
                        //search data
                        $data=mysqli_query($con, "select * from user where type = 'member' and (nama like '%".$_POST['keyword']."%' or email like '%".$_POST['keyword']."%')");
                    }
                    else
                    {
                        @$data=mysqli_query($con, "select * from user where type = 'member'"); 
                    }
                    
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
                                <a href="editMember.php?id=<?php echo $rowData['email']?>">
                                    <img src="img/edit.png" height="15">
                                </a>
                                &nbsp;&nbsp;
                                <img src="img/delete.png" height="15" onclick="getDelete('<?php echo $rowData['email'];?>')" class="kursor">
                            </td>
                            <td><?php echo $a; ?></td>
                            <td>
                                <a href="dataMember.php?id=<?php echo $rowData['email']?>">
                                <?php echo ucwords($rowData['nama']); ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $rowData['email']; ?>
                            </td>
                            <td>
                                <?php echo strtoupper($rowData['status']); ?>
                            </td>
                        </tr>
                        <?php
                        $a++;
                     }
                         ?>
                </table>
          
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