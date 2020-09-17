<?php 
include 'config.php';
$id=$_POST['id'];
$kd=$_POST['kd_berita'];
$judul=$_POST['judul'];
$kontri=$_POST['kontri'];
$editor=$_POST['editor'];
$tanggal=$_POST['tanggal'];

mysql_query("update berita set id='$id', kd_berita='$kd', judul='$judul', kontri='$kontri', editor='$editor', tanggal='$tanggal' where id='$id'");
header("location:arsip.php");

?>