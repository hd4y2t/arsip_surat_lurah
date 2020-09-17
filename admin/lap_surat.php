<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");


$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Image('../logo/plg.jpg',1,1,2,2);
$pdf->SetX(4);                       
$pdf->MultiCell(19.5,0.5,'Kelurahan Talang Bubuk',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : (0711) 540179',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jalan Sentosa Jl. Perguruan No.555 RT.07 Talang Bubuk Kec.Plaju Kota Palembang',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Surat Keluar",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Keluar', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nomor Surat', 1, 0, 'C');
$pdf->Cell(9, 0.8, 'Tujuan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Prihal', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Sifat Surat', 1, 1, 'C');
$pdf->SetFont('Arial','',10);


$query=mysql_query("select * from surat_keluar");

$no=1;

while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tgl_keluar'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['no_surat'], 1, 0,'C');
	$pdf->Cell(9, 0.8, $lihat['tujuan'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['prihal'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['sifat'],1, 1, 'C');

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
$pdf->Cell(40,0.7,"Lurah",0,10,'C');
$pdf->ln(1);

$pdf->Output("Laporan Surat Keluar.pdf","I");

?>

