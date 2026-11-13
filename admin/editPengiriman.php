<?php
require_once 'session.php';
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);

// Ambil data pengiriman
$st = mysqli_prepare($con, "SELECT * FROM pengiriman WHERE pengiriman_id = ?");
mysqli_stmt_bind_param($st, "i", $id);
mysqli_stmt_execute($st);
$row = mysqli_fetch_assoc(mysqli_stmt_get_result($st));
if (!$row) { header("location:pengiriman.php"); exit; }

// Simpan perubahan: hanya harga
if (isset($_POST['submit_Pengiriman'])) {
    if ($_POST['harga'] === '' || (int)$_POST['harga'] < 0) {
        $pesan = 'Ongkir tidak valid';
    } else {
        $harga = (int)$_POST['harga'];
        $up = mysqli_prepare($con, "UPDATE pengiriman SET pengiriman_harga = ? WHERE pengiriman_id = ?");
        mysqli_stmt_bind_param($up, "ii", $harga, $id);
        if (mysqli_stmt_execute($up)) {
            $pesan = 'Ubah ongkir berhasil';
            $row['pengiriman_harga'] = $harga;
        } else {
            $pesan = 'Ubah ongkir gagal';
        }
    }
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
                <h4><center>Edit Ongkir Pengiriman</center></h4>
                <div class="line"></div>
                <form action="editPengiriman.php?id=<?php echo $id; ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label>Nama pengiriman</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['pengiriman_nama']); ?>" disabled>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label>Ongkir (Rp)</label>
                            <input type="number" min="0" class="form-control" name="harga" value="<?php echo (int)$row['pengiriman_harga']; ?>" autofocus>
                        </div>
                        <div class="col-12 mb-3">
                            <?php echo @$pesan; ?>
                                
                        </div>
                        <div class="col-md-6">
                            <input type="submit" name="submit_Pengiriman" class="btn karl-btn" value="Simpan">
                            &nbsp;&nbsp;
                        </div>
                        <div class="col-md-6">
                            <a href="pengiriman.php" class="btn karl-btn">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php require_once 'footer.php'; ?>
</div>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>
</body>
</html>