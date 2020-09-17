<?php 
include 'config.php';

$nik=$_POST['nik'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$jabatan=$_POST['jabatan'];

mysql_query("update pegawai set nama='$nama', alamat='$alamat', no_hp='$no_hp', jabatan='$jabatan' where nik='$nik'");
header("location:pegawai.php");

?>