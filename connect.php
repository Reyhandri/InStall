<?php
$user = "root";
$password = "";
$database = "jbb";
$table = "pengguna";
$salah = "";

	$conn = mysqli_connect("localhost",$user,$password,$database);

	if (!$conn) {
		echo "Koneksi database gagal!: " . $conn->connect_error;
	} 

?>