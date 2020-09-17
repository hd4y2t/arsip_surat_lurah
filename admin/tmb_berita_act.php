<?php 

include 'config.php';
$config = include 'config.php';
$tgl=$_POST['tanggal'];
$no=$_POST['no_surat'];
$kirim=$_POST['pengirim'];
$prihal=$_POST['prihal'];
$sifat=$_POST['sifat'];
$naskah=upload();


if(!$naskah){
	return false;
	echo " data gagal di simpan";
}

mysql_query(" insert into surat_masuk values('','$tgl','$no','$kirim','$prihal','$sifat','$naskah')");

function upload(){
	$namefile =$_FILES['naskah']['name'];
	$ukuranfile=$_FILES['naskah']['size'];
	$error = $_FILES['naskah']['error'];
	$tmpname =$_FILES['naskah']['tmp_name'];

	if($error === 4){
		echo "<script>
		alert('pilih file terlebih dahulu!');</script>";
	return false;
	}

	$ekstensi=['pdf','doc','docx','jpg','jepg','img'];
	$ekstensifile=explode('.', $namefile);
	$ekstensifile = strtolower (end($ekstensifile));
	if( !in_array($ekstensifile, $ekstensi)){
		echo "<script>
		alert('file yang di upload bukan dokumen!');</script>";
	return false;
	}

	if($ukuranfile > 100000000){
		echo "<script>
		alert('file yang di upload terlalu besar!');</script>";
	return false;
	}

	move_uploaded_file($tmpname,'naskah/'.$namefile);

	return $namefile;

}

header("location:arsip.php");
 ?>