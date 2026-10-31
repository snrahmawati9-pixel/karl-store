function getDelete(id)
{
	respon=window.confirm("Apakah yakin ingin dihapus?");
	if(respon == true)
	{
		window.location="admin.php?id="+id;
	}
}

function getDeleteCategori(id)
{
	respon=window.confirm("Apakah yakin ingin dihapus?");
	if(respon == true)
	{
		window.location="categori.php?id="+id;
	}
}
function getDeleteProduct(id)
{
	respon=window.confirm("Apakah yakin ingin dihapus?");
	if(respon == true)
	{
		window.location="product.php?id="+id;
	}
}

