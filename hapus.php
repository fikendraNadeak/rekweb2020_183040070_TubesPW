<?php
session_start();

if( !isset($_SESSION["login"]) ) {
 	header("location: login_admin.php");
 	exit;
 }

require 'functions.php';

$id = $_GET["id"];


if( hapus($id) > 0 ) {
		print "
			<script>
				alert('Data Berhasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		print "
			<script>
				alert('Data Gagal dihapus!');
				document.location.href = 'index.php';
			</script>
		";
}

?>