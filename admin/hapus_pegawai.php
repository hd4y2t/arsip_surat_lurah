<?php 
include 'config.php';
$nik=$_GET['nik'];
mysql_query("delete from pegawai where nik='$nik'");
header("location:pegawai.php");

?>