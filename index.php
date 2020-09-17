	<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Arsip Surat Masuk</h3>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<?php include 'config.php'; ?>
	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from surat_masuk");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Surat Masuk</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	
</div>
<br/>
<br>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Pengirim Surat di sini .." aria-describedby="basic-addon1" name="cari">		
	</div>

</form>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-3">Tanggal Masuk Surat</th>
		<th class="col-md-1">Nomor Surat</th>
		<th class="col-md-1">Pengirim</th>
		<th class="col-md-1">Prihal</th>
		<th class="col-md-2">Sifat Surat</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=$_GET['cari'];
		$berita=mysql_query("select * from surat_masuk where pengirim like '%".$cari."%'");
	}else{
		$berita=mysql_query("select * from surat_masuk");
	}

	$no=1;
	while($b=mysql_fetch_array($berita) ){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['tgl_masuk'] ?></td>
			<td><?php echo $b['no_surat'] ?></td>
			<td><?php echo $b['pengirim'] ?></td>
			<td><?php echo $b['prihal'] ?></td>
			<td><?php echo $b['sifat'] ?></td>
			
			<td>
				<a onclick="if(confirm('Apakah anda yakin ingin mendownload file data ini ??')){ location.href='download.php?naskah=<?php echo $b['file']; ?>' }" class="btn btn-danger">Isi Surat</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	

	<tr>

<br/>
<br/>

</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>


<?php 
include 'footer.php';

?>