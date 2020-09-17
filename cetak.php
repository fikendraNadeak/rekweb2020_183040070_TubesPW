<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
//Query data Tabel smartphone
$elektronik = query("SELECT * FROM elektronik");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html>
<head>
	<title>Dafatar Barang Elektronik Terbaru</title>
</head>
<body>
	<h1>Daftar Barang Elektronik</h1>
	<table class="table" align="center" border="1"  cellspacing="0" cellpadding="10">
		<thead color = "blue">
			<tr>
				<th scope="col">#</th>
				<th>Gambar</th>
				<th>Nama_barang</th>
				<th>Tahun_produksi</th>
				<th>Harga_baru</th>
				<th>Harga_sekon</th>
				<th>Garansi</th>
				<th>Pusat</th>
				<th>Merek</th>
			</tr>';
			$i = 1;
			foreach ($elektronik as $elek) {
				$html .='<tr>
				<td>'. $i++ .'</td>
				<td><img src="../TugasBesar/assets/img/'. $elek["gambar"].'" width="130"></td>
				<td>'. $elek["nama_barang"].'</td>
				<td>'. $elek["tahun_produksi"].'</td>
				<td>'. $elek["harga_baru"].'</td>
				<td>'. $elek["harga_sekon"].'</td>
				<td>'. $elek["garansi"]. '</td>
				<td>'. $elek["pusat"]. '</td>
				<td>'. $elek["merek"].'</td>
				</tr>';
			}	
$html .= '</table>

	

</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();

?>