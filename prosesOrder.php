<?php 
require_once 'session.php';

if(empty($_SESSION['myCart']) || empty($_POST['pembayaran']))
{
    header("location:checkout.php");
    exit;
}

$getLastId=mysqli_query($con, "select * from orderku order by order_id desc");
if(mysqli_num_rows($getLastId)==0)
{
    $id='O1001';
}
else
{
    $rowGetLastId=mysqli_fetch_array($getLastId);
    $getId=substr($rowGetLastId['order_id'],-4)+1;
    $id='O'.$getId;
}

// pembayaran dan bank dari form checkout
$pembayaran=$_POST['pembayaran'];
$bank=@$_POST['bank'];

// ongkir dari pengiriman yang dipilih di cart
$ongkir=0;
if(!empty($_SESSION['pengiriman']))
{
    $kirim=mysqli_query($con, "select * from pengiriman where pengiriman_id='".$_SESSION['pengiriman']."'");
    $rowKirim=mysqli_fetch_array($kirim);
    if($rowKirim)
    {
        $ongkir=$rowKirim['pengiriman_harga'];
    }
}

	$insert=mysqli_query($con, "insert into orderku (order_id, order_tgl, email, order_status, pembayaran, bank, ongkir) values ('".$id."','".date("Y-m-d")."', '".$_SESSION['snrm9427_ecommerce']."', 'pending', '".$pembayaran."', '".$bank."', '".$ongkir."')");
	if($insert==true)
	{
	foreach ($_SESSION['myCart'] as $cartKey => $jmlOrder)
	{
		$pecah=explode('|', $cartKey);
		$productId=$pecah[0];
		$ukuranItem=isset($pecah[1]) ? $pecah[1] : '';

		$product=mysqli_query($con, "select * from product where product_id='".$productId."'");
		$rowProduct=mysqli_fetch_array($product);

		if($rowProduct['product_stok']!=0)
		{
			if($rowProduct['product_stok']<$jmlOrder)
			{
				$jmlOrder=$rowProduct['product_stok'];
			}

			$insertDetail=mysqli_query($con, "insert into order_detail (order_id, product_id, order_detail_qty, product_nama, orderdetail_harga, ukuran) values ('".$id."','".$productId."', '".$jmlOrder."','".$rowProduct['product_nama']."','".$rowProduct['product_harga']."', '".$ukuranItem."')");

			$stokAkhir=$rowProduct['product_stok']-$jmlOrder;

			$updateStock=mysqli_query($con, "update product set product_stok = '".$stokAkhir."' where product_id='".$productId."'");
		}
	}
	unset($_SESSION['myCart']);
	unset($_SESSION['myUkuran']);
	unset($_SESSION['pengiriman']);
	header("location:konfirmasiorder.php?id=".$id);
}
else
{
	$pesan='error';
}
    
?>