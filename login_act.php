<?php 
session_start();
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=$pass;
$query=mysql_query("select * from admin where uname='$uname' and pass='$pas'")or die(mysql_error());
if(mysql_num_rows($query)==1){
	$_SESSION['uname']=$uname;
	header("location:admin/index1.php");
}else{
	 echo "<script>window.alert('Username atau Password Salah');
				window.location='index.php'</script>";
	// mysql_error();
}
// echo $pas;
 ?>