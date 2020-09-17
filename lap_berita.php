<?php
include 'config.php';
require('assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");


$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Image('logo/text.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'iNews Tv',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 081271613211',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl.Hang Jebat ,Talang Semut',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Berita",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Kode Berita', 1, 0, 'C');
$pdf->Cell(9, 0.8, 'Judul', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Kontributor', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Editor', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Tanggal', 1, 1, 'C');
$pdf->SetFont('Arial','',10);

$tanggal=$_GET['tanggal'];
$query=mysql_query("select * from berita where tanggal=" . $tanggal);

$no=1;

while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['kd_berita'],1, 0, 'C');
	$pdf->Cell(9, 0.8, $lihat['judul'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['kontri'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['editor'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['tanggal'],1, 1, 'C');

	$no++;
}
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,0.7,"Palembang,".date("d-m-Y"),0,10,'C');
$pdf->ln(1);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,0.7,"Produser",0,10,'C');
$pdf->ln(1);

$tanggal=$_GET['tanggal'];
$query=mysql_query("select * from berita where tanggal=" . $tanggal);
while($lihat=mysql_fetch_array($query)){

$pdf->Output("berita-".$lihat['tanggal'].".pdf","I");
}
?>

