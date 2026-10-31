<?php 
session_start();
require_once 'koneksi.php';
$user=mysqli_query($con, "select * from user where email='".@$_SESSION['snrm9427_ecommerce']."'");
$rowUser=mysqli_fetch_array($user);
?>