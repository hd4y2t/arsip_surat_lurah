<?php 
include 'profil_act.php';
?>

<?php
$a = mysql_query("select * from berita");
?>

<div class="col-md-10" align="center">
    <h2>Kelurahan Talang Bubuk Kecamatan Plaju</h2>
    <h2>Kota Palembang</h2>
    <h5>Jalan Sentosa Jl. Perguruan No.555 RT.07 Talang Bubuk Kec.Plaju Kota Palembang</h5>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>