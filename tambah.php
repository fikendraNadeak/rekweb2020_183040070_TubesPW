<?php
session_start();

 if( !isset($_SESSION["login"]) ) {
 	header("location: login_admin.php");
 	exit;
 }
//Connet To Databases
require 'functions.php';
//Tombol Submit mengecek sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
//Pengecekan Berhasil Apa gagal
	if( tambah($_POST) > 0 ) {
		print "
			<script>
				alert('Data Berhasil Ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		print "
			<script>
				alert('Data Gagal Ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	   <link rel="stylesheet" href="assets/css/tambah.css">
<title>Daftar Barang Elektronik</title>
</head>
<body>
	<center><h2>Tambah Daftar Barang Elektronik!</h2>
		<form method="post" action="" enctype="multipart/form-data">
			<ul>

				<label for="nama_barang">Masukan Nama Barang : </label> 
				<br>
				<input type="text" name="nama_barang" required>
				
				
				<br>
				<label for="tahun_produksi">Masukan Tahun Produksi : </label> 
				<br>
				<input type="text" name="tahun_produksi" required>
			
				<br>
				
				<label for="harga_baru">Masukan Harga Baru :</label>
				<br>
				<input type="text" name="harga_baru" required>
				
				<br>
				
				<label for="harga_sekon">Masukan Harga Sekon :</label>	 
				<br>
				<input type="text" name="harga_sekon" required>
				
				<br>
				
				<label for="garansi">Masukan Garansi :</label>	 
				<br>	 
				<input type="text" name="garansi" required>
				
				<br>

				<label for="pusat">Masukan Pusat : </label> 
				<br>
				<input type="text" name="pusat" required>
				
				<br>

				<label for="merek">Masukan  Merek : </label> 
				<br>
				<input type="text" name="merek" required>
				
				<br>
				<label for="gambar">Masukan Gambar :</label>		 
				<br>
				<input type="file" name="gambar" id="gambar" required>
				
				<br>
				<br>
				
				<td>
					<button type="submit" name="submit" class="btn btn-info">Tambah Data Barang Elektronik!</button>
				</td>
			</ul>
		</form></center>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	
	
	
</body>
</html>