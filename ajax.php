<?php
require 'functions.php';
// Query data Tabel elektronik  
$keyword = $_GET['keyword'];
$query = "SELECT * FROM elektronik WHERE
				nama_barang LIKE '%$keyword%' OR
				tahun_produksi LIKE '%$keyword%' OR
				harga_baru LIKE '%$keyword%' OR
				harga_sekon LIKE '%$keyword%' OR
				garansi LIKE '%$keyword%' OR
				pusat LIKE '%$keyword%' OR 
				merek LIKE '%$keyword%'
			";
$elektronik = query($query);
?><div id="container">
	<table class="table" align="center" border="1"  cellspacing="0" cellpadding="10">
		<thead class="thead-dark">
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