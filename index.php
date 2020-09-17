<?php 
session_start();

if ( !isset($_SESSION['login'])) {
	header("Location: login_admin.php");
	exit;
} 

require 'functions.php';
//Query data Tabel Film
$elektronik = query("SELECT * FROM elektronik");

if( isset($_POST['cari'])) {
	$elektronik = cari($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Daftar Barang Elektronik Terbaru</title>
<style>
	.loader {
		width: 90px;
		position: absolute;
		top: 120px;
		left: 900px;
		z-index: -1;
		display: none;

	}

	@media print {
         .logout, .tambah, .form-cari, .form-logout, .opsi {
         	display: none;
         }
	}

</style>

</head>
<body> 
	<h2 align="center">Daftar Barang Elektronik Terbaru</h2>
	
	<form action="logout.php" class="form-logout">
	
	<center><button a href="logout.php" class="logout btn btn-success"  >LOGOUT</a></button></center><br>
			<center><a href="cetak.php " class="btn btn-info">cetak</a></center>
		</form>
		<br>

	<center><a href="tambah.php" class="btn btn-info">Tambahkan Barang Elektronik</a></center>
		<br><br>
	
	<form action="" method="post" class="form-cari">
		<center><input type="text" name="keyword" size="50" autofocus placeholder="Masukan keyword pencarian barang elektronik..." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari" class="btn btn-info">Telusuri!</button></center>
	</form>
	<br>
	<div id="container">
	<table  class="table table-bordered table-dark" align="center" border="1"  cellspacing="0" cellpadding="10">
			<tr>
				<th scope="col">#</th>
				<th>Opsi</th>
				<th>Gambar</th>
				<th>Nama_barang</th>
				<th>Tahun_produksi</th>
				<th>Harga_baru</th>
				<th>Harga_sekon</th>
				<th>Garansi</th>
				<th>Pusat</th>
				<th>Merek</th>
			</tr>
			<?php $i = 1; ?>	
				<?php foreach($elektronik as $elek) : ?>
			<tr>
				<td><?= $i++; ?></td>
				<td><button type="button" class="btn btn-success"><a href="ubah.php?id=<?= $elek["id"]; ?> ">Ubah</a></button>  
					<button type="button" class="btn btn-warning"><a href="hapus.php?id=<?= $elek["id"]; ?>" onClick="return confirm('Anda Yakin akan dihapus?')">Hapus</a></button>
				</td>
				<td><img width= "150px" src="../TugasBesar/assets/img/<?= $elek['gambar']; ?>"></td>
				<td><?= $elek['nama_barang']; ?></td>
				<td><?= $elek['tahun_produksi']; ?></td>
				<td><?= $elek['harga_baru']; ?></td>
				<td><?= $elek['harga_sekon']; ?></td>
				<td><?= $elek['garansi']; ?></td>
				<td><?= $elek['pusat']; ?></td>
				<td><?= $elek['merek']; ?></td>
			</tr>
				<?php endforeach; ?>
	</table>
</div>
</thead>
				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
	 var keyword = document.getElementById('keyword');
	 var container = document.getElementById('container');

	 keyword.addEventListener('keyup', function()
	 {
	 	var xhr = new XMLHttpRequest();
	 	xhr.onreadystatechange = function()
	 {
	 	if (xhr.readyState == 4 && xhr.status == 200) 
	 	{
	 	container.innerHTML = xhr.responseText;
	    }
	}
	 xhr.open('GET','ajax.php?keyword='+keyword.value,true);
	 xhr.send();
	});

</script>	
</body>
</html>  