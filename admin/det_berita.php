<?php 
include 'header.php';
?>

<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from berita where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Kode Berita</td>
			<td><?php echo $d['kd_berita'] ?></td>
		</tr>
		<tr>
			<td>Judul Berita</td>
			<td><?php echo $d['judul'] ?></td>
		</tr>
		<tr>
			<td>Kontributor</td>
			<td><?php echo $d['kontri'] ?></td>
		</tr>
		<tr>
			<td>Editor</td>
			<td><?php echo $d['editor'] ?></td>
		</tr>
		<tr>
			<td>tanggal</td>
			<td><?php echo $d['tanggal']; ?>-</td>
		</tr>
		
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>