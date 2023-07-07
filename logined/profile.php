<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="profile.css">
  <title>MidnightCoder</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="../img/1.png" type ="image/x-icon">
</head>

<body>
  <?php
    $idPengguna = $_SESSION['id'];
  ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
        <img src="../img/1.png" alt="" width="50" height="50" class="me-2">
        <strong>InStall </strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
       
        <ul class="navbar-nav ms-auto">
          
          <?php
              if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
                $jenis = $_SESSION['id_jenis'];
                if ($jenis == 2) {
                  echo "
                        <li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='../index.php'>Beranda</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='https://wa.me/+628886964888'>Kontak</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='../us.html'>About Us</a>
                        </li>
                          <a class='nav-link' href='histori.php' style='color: white;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='../pengusaha/pengusaha.php' style='color: white;'>Bisnis Anda</a>
                          <li>
                          <li>
                          <a class='nav-link' href='../pengusaha/menu.php' style='color: white;'>Menu</a>
                          </li>
                          <a class='nav-link' href='../pengusaha/kelola.php' style='color: white;'>Kelola Stok</a>
                          </li>
                          <a class='nav-link' href='../pengusaha/keuangan.php' style='color: white;'>Kelola keuangan</a>
                          </li>
                        ";
                }
              }
            ?>
            <li>
              <a href="http://" target="_blank" rel="noopener noreferrer"></a>
            </li>
            </ul>
            <ul class="navbar-nav ms-auto">
            <?php
              if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
                $email = $_SESSION['email'];
                echo '
                  <li class="nav-item">
                    <img src="userimg/user-' . $idPengguna . '.jpg" class="rounded-circle" onError="this.src = \'../img/1.png\'" style="width:40px; height:40px">
                  </li> 
                  <li class="nav-item">
                    <a href="../logined/profile.php" class="nav-link">' . $email . '</a>
                  </li>
                  <li class="nav-item">
                    <a href="../logout.php" class="nav-link" style="color: red;">Logout</a>
                  </li>
                  ';
              } else {
                echo "
                  <li class='nav-item'>
                    <a class='nav-link' href='register.php'> Daftar</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='login.php'> Masuk</a>
                  </li>
                  ";
              }
            ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- BREAD crumb -->
  <div class="container">
    <nav aria-label="breadcrumb" class="bg-light mt-3">
      <ol class="breadcrumb p-3">
        <li class="breadcrumb-item"><a href="../index.php" class="text-decoration-none">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="#" class="text-decoration-none">Profile</a></li>
      </ol>
    </nav>
  </div>
  <!-- BREAD crumb -->
  <div class="container">
    <div class="row row-product bg-light">
      <div class="col-md-6">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <img src="userimg/user-<?php echo $idPengguna; ?>.jpg" onError="this.src = '../img/1.png'" class="img-thumbnail rounded-circle">
          </div>
        </div>
      </div>
      <div class="col-md-6 bg-dark p-5" style="color: rgb(255, 255, 255)">
        <h2>Profile</h4>
          <hr style="background: rgb(170, 170, 170)">
          <div class="container" style="border-radius: 8px;">
            <div class="row">
              <div class="col-6 ">
                <p>Nama lengkap: <br> <span class="fw-bold fst-italic"><i
                      class="text-primary fa-solid fa-arrow-right"></i><?php

                      include "../connect.php";

                      $sql = "SELECT * FROM pengguna WHERE id=$idPengguna";
                      $hasil = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_assoc($hasil);
                      $name = $row['nama'];

                      echo " $name";
                      ?></span></p>
                <p>Tanggal lahir: <br> <span class="fw-bold fst-italic"><i
                      class="text-primary fa-solid fa-arrow-right"></i>
                      <?php
                      $tglLahir = $row['tglLahir'];
                      if ($tglLahir === NULL) {
                        echo " -";
                      } else {
                        echo "$tglLahir";
                      }
                      ?></span>
                </p>
                <p>Email: <br> <span class="fw-bold fst-italic"><i class="text-primary fa-solid fa-arrow-right"></i><?php
                      $email = $row['email'];
                      echo " $email";
                ?></span></p>
              </div>
              <div class="col-6" style="border-left: solid 1px white;">
                <p>No Telepon: <br> <span class="fw-bold fst-italic"><i class="text-primary fa-solid fa-arrow-right"></i>
                      <?php
                      $notelp = $row['notelp'];
                      if ($notelp === NULL) {
                        echo " -";
                      } else {
                        echo "$notelp";
                      }
                      ?></span></p>
                <p>Domisili: <br> <span class="fw-bold fst-italic"><i class="text-primary fa-solid fa-arrow-right"></i>
                    <?php
                    $domisili = $row['domisili'];
                    if ($domisili === NULL) {
                      echo " -";
                    } else {
                      echo "$domisili";
                    }
                    ?></span></p>
                <p>Jenis Akun: <br> <span class="fw-bold fst-italic"><i class="text-primary fa-solid fa-arrow-right"></i><?php        
                      $jenis = $_SESSION['jenis'];
                      echo " $jenis";
                ?></span>
                </p>
              </div>
            </div>
          </div>
          <div class="mt-4 text-center">
            <form action="editprof.php">
              <button class="button"> Edit Profile </button>
            </form>
          </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark p-5 position-sticky top-100" style="margin-top: 80px;">
    <div class="container">
      <div class="row ">
        <div class="col" style="text-align: center;">
          <img src="../img/1.png" style="width: 30px;">
          <span style="color: white;">Copyright &copy; 2023 Barudak Sistem</span>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>