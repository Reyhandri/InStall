<?php
    include "../connect.php";
    session_start();
    $idPengguna = $_SESSION['id'];

    // Ganti Bio
    if(isset($_POST["gantiBio"])){
        $nama = $_POST["nama"];
        $tglLahir = $_POST["tglLahir"];
        $notelp = $_POST["notelp"];
        $domisili = $_POST["domisili"];
        $pass = md5($_POST["password"]);

        $passSql = "SELECT * FROM pengguna WHERE id='$idPengguna'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow = mysqli_fetch_assoc($passResult);
        if ($pass === $passRow['password']){ 
            $sql = "UPDATE pengguna SET nama = '$nama', tglLahir = '$tglLahir', notelp = '$notelp', domisili = '$domisili' WHERE id ='$idPengguna'";   
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("Update Bio Berhasil.");
                        window.history.back(1);
                    </script>';
            }else{
                echo '<script>alert("Update Bio Gagal, coba lagi.");
                        window.history.back(1);
                    </script>';
            } 
        } else {
            echo '<script>alert("Password salah.");
                        window.history.back(1);
                    </script>';
        }
    }

    // Ganti Password
    if(isset($_POST["gantiPass"])){
        $pass = md5($_POST["password"]);
        $passb = md5($_POST["passwordb"]);
        $passbk = md5($_POST["passwordk"]);

        $passSql = "SELECT * FROM pengguna WHERE id='$idPengguna'"; 
        $passResult = mysqli_query($conn, $passSql);
        $passRow = mysqli_fetch_assoc($passResult);
        if ($pass === $passRow['password']){ 
            $sql = "UPDATE pengguna SET password = '$passb' WHERE id ='$idPengguna'";   
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("Update Password Berhasil.");
                        window.location=document.referrer;
                      </script>';
            }else{
                echo '<script>alert("Update Password Gagal, coba lagi.");
                        window.history.back(1);
                      </script>';
            } 
        } else {
            echo '<script>alert("Password salah.");
                        window.history.back(1);
                    </script>';
        }
    }

    // Hapus Foto Profil
    if (isset($_POST["removePic"])) {
        // Ingat untuk ganti directory document root
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/tester/sjk-pabw-2022/logined/userimg/user-" . $idPengguna . ".jpg";
        if (file_exists($filename)) {
            unlink($filename);
            echo "
            <script>
                alert('Foto dihapus!');
                window.location=document.referrer;
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Foto tidak ada!');
                window.location=document.referrer;
            </script>
            ";
        }
    }

    // Ganti Foto Profil
    if (isset($_POST["changePic"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== FALSE) {
            $newfilename = "user-".$idPengguna.".jpg";

            // Ingat untuk ganti directory document root
            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/tester/sjk-pabw-2022/logined/userimg/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                echo "
                <script>
                    alert('Berhasil ganti profil!');
                    window.location=document.referrer;
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Gagal mengganti profil, harap coba lagi.');
                    window.location=document.referrer;
                </script>
                ";
            }
        } else {
            echo "
            <script>
                alert('Mohon pilih gambar terlebih dahulu');
                window.history.back(1);
            </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Mohon pilih gambar terlebih dahulu');
                window.history.back(1);
            </script>
            ";
    }

    
?>