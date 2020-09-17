<?php

require 'functions.php';
 $elektronik = query("SELECT * FROM elektronik");

if ( isset($_POST['cari'])) {
	$elektronik = cari($_POST['keyword']);
}
if (isset($_POST['submit'])) {
	if ($_POST['username'] == 'username' && $_POST['password'] == 'password') {
		header("Location: index.php");
		exit;
	}else{
		$nValid = true;
	}

}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/user.css">
<title>User</title>
</head>
	<style>
		.container {
			text-align: center;
		}
		.content {
			
		}
		.gambar {
			
			
		}
	</style>
<body bgcolor="red">
	<center><h2>Daftar Barang Elektronik Terbaru!</h2></center>
	<form action="" method="post">
		
		<div class="Login">
          <center><button type="button" class="btn btn-danger"><a href="Login_admin.php">Login sebagai admin</a></center></button>
           </div>
            <br><br>
            <form class="form-cari">
            <center><input type="text" name="keyword" size="50" autofocus placeholder="Masuk keyword pencarian barang....." autocomplete="off" id="keyword">
            <button type="submit" name="cari" id="tombol-cari" class="btn btn-success">Telurusi</button></center>
	</form>
	<br>
		 <div class="container" id="container">
		 	<?php foreach ($elektronik as $elek) : ?>
		        <div class="content">
		           <div class="gambar">
                   <p><img height="200" width="150" src="../TugasBesar/assets/img/<?= $elek['gambar']; ?>">
           </div>
            <p class="nama">
				<a href="profil.php?id=<?= $elek['id']; ?>"><?= $elek['nama_barang']; ?></a>
			</p>
			<p><?= $elek['merek']; ?></p>
			<?php endforeach; ?>
        </div>
 </div>

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
	 xhr.open('GET','cari_user.php?keyword='+keyword.value,true);
	 xhr.send();
	});
	 
	 </script>
</body>
</html>