<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span> Edit Data Pegawai</h3>
<a class="btn" href="pegawai.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$nik=mysql_real_escape_string($_GET['nik']);
$det=mysql_query("select * from pegawai where nik='$nik'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_pegawai.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="nik" value="<?php echo $d['nik'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>alamat</td>
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
			</tr>
			<tr>
				<td>No Telpon</td>
				<td><input type="text" class="form-control" name="no_hp" value="<?php echo $d['no_hp'] ?>"></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><select class="form-control" name="jabatan">
						<option value="kontributor" <?php echo $d['jabatan']=="kontributor"?"selected": "";?>> Kontributor </option>
						<option value="editor" <?php echo $d['jabatan']=="editor"?"selected": ""; ?>>Editor </option>
						<option value="penyiar" <?php echo $d['jabatan']=="penyiar"?"selected": ""; ?>>Penyiar </option>
			</select></td>

			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>