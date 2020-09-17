<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from surat_masuk where id='$id'");
header("location:arsip.php");

?>