<?php  
//Connect To Databases
$conn = mysqli_connect('localhost', 'root', '', 'pw_183040070');

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data) {
	global $conn;
	
	$nbrg = htmlspecialchars($data["nama_barang"]);
	$tpdi = htmlspecialchars($data["tahun_produksi"]);
	$hbu = htmlspecialchars($data["harga_baru"]);
	$hsn = htmlspecialchars($data["harga_sekon"]);
	$gnsi = htmlspecialchars($data["garansi"]);
	$pst = htmlspecialchars($data["pusat"]);
	$mrk = htmlspecialchars($data["merek"]);

	//upload gambar
	$gbr = upload();
	if(!$gbr) {
	return false;
}
	
	// Query insert data 
	$query = "INSERT INTO elektronik VALUES 
				('','$gbr','$nbrg', '$tpdi', '$hbu', '$hsn','$gnsi','$pst','$mrk')
			 ";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}
	// Functions upload
function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName =$_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if($error === 4) {
	echo"<script>
	alert('Pilih gambar terlebih dahulu!');
	</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg', 'png'];
	$ekstensiGambar =explode('.', $namaFile);
	$ekstensiGambar = strtolower (end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {

			echo"<script>
	alert('yang anda upload bukan gambar!');
	</script>";
		return false;

	}
	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000) {
			echo"<script>
	alert('Ukuran Gambar terlalu besar!');
	</script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	
	move_uploaded_file($tmpName, '../TugasBesar/assets/img/' . $namaFileBaru);

	return $namaFileBaru;

}



function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM elektronik WHERE id = $id");
	
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;
	
	$id = $data["id"];
	$nbrg = htmlspecialchars($data["nama_barang"]);
	$tpdi = htmlspecialchars($data["tahun_produksi"]);
	$hbu = htmlspecialchars($data["harga_baru"]);
	$hsn = htmlspecialchars($data["harga_sekon"]);
	$gnsi = htmlspecialchars($data["garansi"]);
	$pst = htmlspecialchars($data["pusat"]);
	$mrk = htmlspecialchars($data["merek"]);

	// cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4) {
    	$gbr = $gambarLama;
    }else {
    	$gbr = upload();
    }
	
	
	// Query insert data 
	$query = "UPDATE elektronik SET 
				nama_barang = '$nbrg',
				tahun_produksi = '$tpdi',
				harga_baru = '$hbu',
				harga_sekon = '$hsn',
				garansi = '$gnsi',
				pusat = '$pst',
				merek = '$mrk',
				gambar = '$gbr',
				
				
			 WHERE id = '$id'
			 ";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM elektronik WHERE
				nama_barang LIKE '%$keyword%' OR
				tahun_produksi LIKE '%$keyword%' OR
				harga_baru LIKE '%$keyword%' OR
				harga_sekon LIKE '%$keyword%' OR
				garansi LIKE '%$keyword%' OR
				pusat LIKE '%$keyword%' OR 
				merek LIKE '%$keyword%'
			";
	return query($query);
}
function registrasi($data) {
	global $conn;

	$username =strtolower(stripslashes($data["username"]));
	$password =mysqli_real_escape_string($conn, $data["password"]);
	$password2 =mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum

     $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
     if( mysqli_fetch_assoc($result)) {
     	echo "<script>
     	alert('username sudah terdaftar!')</script>";

     	return false;
     }


	//cek konfirmasi password
	if( $password !== $password2) {
		echo "<script>
		alert('konfirmasi password tidak sesuai!');
		</script>";

		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke data base

	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);


}

?>