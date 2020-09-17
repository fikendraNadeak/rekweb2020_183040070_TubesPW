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
?>
<div class="container" id="container">
		<?php foreach ($elektronik as $elek) : ?>
			<div class="content">
				<div class="gambar">
					<p><img height="200" width="150" src="../TugasBesar/assets/img/<?= $elek['gambar'];?>">
				</div>
				<p class="nama">
					<a href="profil.php?id=<?=$elek['id']; ?>"><?= $elek ['nama_barang']; ?></a>
				</p>
				<p><?$elek['tahun_produksi']; ?></p>
				<?php endforeach; ?>
	</div>
</div>