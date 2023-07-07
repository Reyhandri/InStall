<?php
include "../connect.php";
session_start();

$idPengguna = $_SESSION['id'];

$namaBisnis = $_POST["nama"];
$deskripsi = $_POST["deskripsi"];
$harga = $_POST["harga"];
$bentuk = $_POST["bentuk"];
$pendapatan = $_POST["pendapatan"];
$tahun = $_POST["tahun"];
$status = $_POST["status"];
$jenis = $_POST["jenis"];
$fitur = $_POST["fitur"];
$benda = $_POST["benda"];
$mapLat = $_POST["lat"];
$mapLng = $_POST["lng"];
$kota = $_POST["kota"];
$rataPerB = $_POST["rataB"];
$rataPerT = $_POST["rataT"];
$alamat = $_POST["alamat"];
$namaPemilik = $_SESSION['nama'];
$notelp = $_POST["notelp"];
$idPengusaha = $_SESSION['id'];

    $var = "INSERT INTO bisnis (nama, deskripsi, harga, bentuk, 
    pendapatan, didirikan, status, jenis, fitur, benda, 
    mapLat, mapLng, kota, alamat, rataPerB, rataPerT, 
    namaPemilik, notelp, idPengusaha) VALUES ('$namaBisnis','$deskripsi','$harga','$bentuk',
    '$pendapatan','$tahun','$status','$jenis','$fitur','$benda','$mapLat','$mapLng','$kota','$alamat','$rataPerB',
    '$rataPerT','$namaPemilik','$notelp','$idPengusaha')";

    if(isset($_POST['submit'])) {
        $hasil = $conn->query($var);
        if ($hasil === TRUE) { 
            header("Location: pengusaha.php");
        } else {
            echo "
            <script>
                alert('Mohon maaf gagal mengupload bisnis!');
                window.location=document.referrer;
            </script>
            ";
        }
    }

$conn->close();
?>