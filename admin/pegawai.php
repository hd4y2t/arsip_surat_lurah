<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Arsip Surat Keluar</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModals" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Surat Keluar</button>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from surat_keluar");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Surat Keluar</td>		
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
		<input type="text" class="form-control" placeholder="Cari Nomor Surat di sini .." aria-describedby="basic-addon1" name="cari">		
	</div>

</form>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Tanggal Kirim Surat</th>
		<th class="col-md-2">Nomor Surat</th>
		<th class="col-md-3">Tujuan</th>
		<th class="col-md-1">Prihal</th>
		<th class="col-md-1">Sifat Surat</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=$_GET['cari'];
		$berita=mysql_query("select * from surat_keluar where no_surat like '%".$cari."%'");
	}else{
		$berita=mysql_query("select * from surat_keluar");
	}

	$no=1;
	while($b=mysql_fetch_array($berita) ){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['tgl_keluar'] ?></td>
			<td><?php echo $b['no_surat'] ?></td>
			<td><?php echo $b['tujuan'] ?></td>
			<td><?php echo $b['prihal'] ?></td>
			<td><?php echo $b['sifat'] ?></td>
			
			<td>
				<a onclick="if(confirm('Apakah anda yakin ingin mendownload file data ini ??')){ location.href='../download.php?naskah=<?php echo $b['file']; ?>' }" class="btn btn-primary">Lihat</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	

	<tr>

<br/>
<a style="margin-bottom:10px" href="lap_surat.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span> Cetak </a>
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

<div id="myModals" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Surat Keluar</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_pegawai_act.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tanggal Kirim Surat </label>
						<input name="tanggal" type="text" class="form-control" id="tgl1" autocomplete="off" placeholder="Tanggal Kirim Surat">
					</div>
					<div class="form-group">
						<label>No Surat</label>
						<input name="no_surat" type="text" class="form-control" placeholder="Nomor Surat">
					</div>
					<div class="form-group">
						<label>Tujuan</label>
						<input name="pengirim" type="text" class="form-control" placeholder="Tujuan Surat">
					</div>
					<div class="form-group">
						<label>Prihal</label>
						<input name="prihal" type="text" class="form-control" placeholder="Prihal">
					</div>
						<div class="form-group">
						<label>Sifat Surat</label>
						<input name="sifat" type="text" class="form-control" placeholder="Sifat Surat">
					</div>
					<div class="form-group">
						<div class="form-group">
							<label>File</label>
							<input name="naskah" type="file" class="form-control" ">
						</div>	
					</div>
					
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
				</div>

			</form>
		</div>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl1").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>

<?php 
include 'footer.php';

?>