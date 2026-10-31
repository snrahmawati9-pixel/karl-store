<?php 
require_once 'session.php';

$getLastId=mysqli_query($con, "select * from orderku order by order_id desc");
if(mysqli_num_rows($getLastId)==0)
{
    $id='O1001';
}
else
{
    //sudah ada data
    $rowGetLastId=mysqli_fetch_array($getLastId);
    $getId=substr($rowGetLastId['order_id'],-4)+1;
    $id='O'.$getId;
}

	$insert=mysqli_query($con, "insert into orderku (order_id, order_tgl, email, order_status) values ('".$id."','".date("Y-m-d")."', '".$_SESSION['snrm9427_ecommerce']."', 'pending')");
	if($insert==true)
	{
	foreach ($_SESSION['myCart'] as $productId => $jmlOrder)
	{
		$product=mysqli_query($con, "select * from product where product_id='".$productId."'");
		$rowProduct=mysqli_fetch_array($product);

		if($rowProduct['product_stok']!=0)
		{
			if($rowProduct['product_stok']<$jmlOrder)
			{
				$jmlOrder=$rowProduct['product_stok'];
			}

			$insertDetail=mysqli_query($con, "insert into order_detail (order_id, product_id, order_detail_qty, product_nama, orderdetail_harga) values ('".$id."','".$productId."', '".$jmlOrder."','".$rowProduct['product_nama']."','".$rowProduct['product_harga']."')");

			$stokAkhir=$rowProduct['product_stok']-$jmlOrder;

			$updateStock=mysqli_query($con, "update product set product_stok = '".$stokAkhir."' where product_id='".$productId."'");
		}
	}
	unset($_SESSION['myCart']);
	header("location:konfirmasiorder.php?id=".$id);
}
else
{
	$pesan='error';
}
    
?>