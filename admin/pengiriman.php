<?php
require_once 'session.php';
if (isset($_GET['id'])) {
    $del = mysqli_prepare($con, "DELETE FROM pengiriman WHERE pengiriman_id = ?");
    mysqli_stmt_bind_param($del, "i", $_GET['id']);
    mysqli_stmt_execute($del);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="css/responsive.css" rel="stylesheet">
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
                    <h4><center>Data Pengiriman</center></h4>
                    <div id="search" align="right">
                        <form method="post" action="pengiriman.php">
                            <input type="text" name="keyword" value="<?php echo htmlspecialchars(@$_POST['keyword']); ?>" />
                            &nbsp;&nbsp;
                            <input type="submit" name="submitSearch" class="se" value="Search" />
                        </form>
                    </div>
                    <div class="line" align="center"></div>

                    <table class="dataField">
                        <tr class="bgJudul judulData">
                            <td width="50"></td>
                            <td width="60">No</td>
                            <td>Nama</td>
                            <td>Ongkir</td>
                            <td>Status</td>
                        </tr>
                        <?php
                        $a = 1;
                        $like = '%' . trim(@$_POST['keyword']) . '%';
                        $st = mysqli_prepare($con, "SELECT * FROM pengiriman WHERE pengiriman_nama LIKE ? ORDER BY pengiriman_id ASC");
                        mysqli_stmt_bind_param($st, "s", $like);
                        mysqli_stmt_execute($st);
                        $data = mysqli_stmt_get_result($st);

                        while ($row = mysqli_fetch_assoc($data)) {
                            $css = ($a % 2 == 0) ? 'genap' : 'ganjil';
                        ?>
                        <tr class="<?php echo $css; ?>">
                            <td>
                                <a href="editPengiriman.php?id=<?php echo $row['pengiriman_id']; ?>"><img src="img/edit.png" height="15"></a>
                                &nbsp;&nbsp;
                                <a href="pengiriman.php?id=<?php echo $row['pengiriman_id']; ?>"
                                   onclick="return confirm('Hapus metode pengiriman ini?')"><img src="img/delete.png" height="15"></a>
                            </td>
                            <td><?php echo $a; ?></td>
                                <td><?php echo htmlspecialchars($row['pengiriman_nama']); ?></td>
                                <td><?php echo "Rp " . number_format($row['pengiriman_harga'], 0, ",", "."); ?></td>
                            <td><?php echo strtoupper($row['pengiriman_status']); ?></td>
                        </tr>
                        <?php $a++; } ?>
                    </table>
                </div>
            </div>
    </section>
    <?php include 'footer.php'; ?>

</div>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>
</body>
</html>