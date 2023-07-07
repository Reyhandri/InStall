<?php
session_start();
include "connect.php";

$email = $_POST['email'];
$pass = md5($_POST['pass']);

$sql = mysqli_query($conn, "SELECT id, id_jenis, jenis, nama, email, notelp, tglLahir, domisili password FROM pengguna WHERE email = '$email' AND password = '$pass'");
$count = mysqli_num_rows($sql);
$fetchData = mysqli_fetch_array($sql);

    if ($count > 0) {
        $idJenis = $fetchData['id_jenis'];
        $name = $fetchData['nama'];
        $jenis = $fetchData['jenis'];
        $notelp = $fetchData['notelp'];
        $tglLahir = $fetchData['tglLahir'];
        $domisili = $fetchData['domisili'];
        $idPengguna = $fetchData['id'];
        if ($idJenis == "2") {
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $name;
            $_SESSION['password'] = $pass;
            $_SESSION['id_jenis'] = $idJenis;
            $_SESSION['jenis'] = $jenis;
            $_SESSION['notelp'] = $notelp;
            $_SESSION['tglLahir'] = $tglLahir;
            $_SESSION['domisili'] = $domisili;
            $_SESSION['id'] = $idPengguna;

            header("Location: investor/investor.php");

        } else if ($idJenis == "3") {
                $_SESSION['email'] = $email;
                $_SESSION['nama'] = $name;
                $_SESSION['password'] = $pass;
                $_SESSION['id_jenis'] = $idJenis;
                $_SESSION['jenis'] = $jenis;
                $_SESSION['notelp'] = $notelp;
                $_SESSION['tglLahir'] = $tglLahir;
                $_SESSION['domisili'] = $domisili;
                $_SESSION['id'] = $idPengguna;
    
                header("Location: pengusaha/pengusaha.php");
        } else if ($idJenis == "4") {
                $_SESSION['email'] = $email;
                $_SESSION['nama'] = $name;
                $_SESSION['password'] = $pass;
                $_SESSION['id_jenis'] = $idJenis;
                $_SESSION['jenis'] = $jenis;
                $_SESSION['notelp'] = $notelp;
                $_SESSION['tglLahir'] = $tglLahir;
                $_SESSION['domisili'] = $domisili;
                $_SESSION['id'] = $idPengguna;
    
                header("Location: index.php");
        } else if ($idJenis == "1") {
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $name;
            $_SESSION['password'] = $pass;
            $_SESSION['id_jenis'] = $idJenis;
            $_SESSION['jenis'] = $jenis;
            $_SESSION['id'] = $idPengguna;

            header("Location: admins/admin.php");
        }
    } else {
        header("Location: login.php?error=1");
    }

?>