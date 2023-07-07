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
  <link rel="stylesheet" type="text/css" href="product.css">
  <title>InStall</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="img/1.png" type ="image/x-icon">
</head>

<body>
  <?php
    include "connect.php";
  ?>
  
  <?php
  if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
    $idPengguna = $_SESSION['id'];
    $jenis = $_SESSION['jenis'];
  }

  ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/1.png" alt="" width="50" height="50" class="me-2">
        <strong>InStall</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./investor/investor.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="us.html">About Us</a>
          </li>
          <?php
              if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
                $jenis = $_SESSION['id_jenis'];
                if ($jenis == 2) {
                  echo "
                          <a class='nav-link' href='logined/histori.php' style='color: #c62298;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='logined/histori.php' style='color: #c62298;'>Bisnis Anda</a>
                        ";
                }
              }
            ?>     
        </ul>
        <ul class="navbar-nav ms-auto">
        <?php
            if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
              $email = $_SESSION['email'];
              echo '
                      <li class="nav-item">
                        <img src="logined/userimg/user-' . $idPengguna . '.jpg" class="rounded-circle" onError="this.src = \'img/1.png\'" style="width:40px; height:40px">
                      </li> 
                      <li class="nav-item">
                        <a href="logined/profile.php" class="nav-link">' . $email . '</a>
                      </li>
                      <li class="nav-item">
                        <a href="logout.php" class="nav-link" style="color: red;">Logout</a>
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
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Beranda</a></li>
        <li class="breadcrumb-item active"><a href="#" class="text-decoration-none">Product</a></li>
        <!-- <li class="breadcrumb-item active" aria-current="page">Product</li> -->
      </ol>
    </nav>
  </div>
  <!-- BREAD crumb -->

  <!-- Product -->
  <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM bisnis WHERE id = $id";
    $hasil = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($hasil);
    $idPengusaha = $row['idPengusaha'];

    $sql2 = "SELECT * FROM pengguna WHERE id=$idPengusaha";
    $hasil2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($hasil2);

    // Fetch Specific Data
    $nama = $row['nama']; 
    $deskripsi = $row['deskripsi'];     
    $harga = $row['harga'];        
    $bentuk = $row['bentuk'];
    $pendapatan = $row['pendapatan'];
    $didirikan = $row['didirikan'];
    $status = $row['status'];
    $jenis = $row['jenis'];
    $fitur = $row['fitur'];
    $benda = $row['benda'];
    $mapLat = $row['mapLat'];
    $mapLng = $row['mapLng'];
    $kota = $row['kota'];
    $alamat = $row['alamat'];
    $rataPerB = $row['rataPerB'];
    $rataPerT = $row['rataPerT'];  
    $namaPemilik = $row2['nama'];       
    $notelp = $row['notelp'];        
  
  ?>

  <div class="container">
    <div class="row row-product bg-light">
      <div class="col-2 d-block d-md-none"></div>
      <div class="col-md-5 col-8">
        <figure class="figure">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/1.png" class="w-100" style="border-radius: 5px; width: 450px;">
              </div>
            </div>
          </div>
        </figure>
      </div>
      <div class="col-2 d-block d-md-none"></div>
      <div class="col-md-7 col-12">
        <h3 class="h3-header"><?php echo $nama?></h3>
        <h3 class="h3-header">Rp <?php echo $harga?></h3>
        <div class="bg-white p-3" style="border-radius: 8px;">
          <div class="row">
            <div class="col-6 ">
              <p>Bentuk tempat: <br> <span class="fw-bold fst-italic"><i
                    class="text-primary fa-solid fa-arrow-right"></i> <?php echo $bentuk?></span></p>
              <p>Pendapatan (Setiap Bulan): <br> <span class="fw-bold fst-italic"><i
                    class="text-primary fa-solid fa-arrow-right"></i> Rp <?php echo $pendapatan?></span>
              </p>
              <p>Didirikan pada: <br> <span class="fw-bold fst-italic"><i
                    class="text-primary fa-solid fa-arrow-right"></i> <?php echo $didirikan?></span></p>
            </div>
            <div class="col-6 " style="border-left: solid 1px rgb(163, 163, 163);">
              <p>Status: <br> <span class="fw-bold fst-italic"><i class="text-primary fa-solid fa-arrow-right"></i>
                  <?php echo $status?></span></p>
              <p>Jenis: <br> <span class="fw-bold fst-italic"><i class="text-primary fa-solid fa-arrow-right"></i>
                  <?php echo $jenis?></span>
              </p>
            </div>
          </div>
        </div>
        <?php
        if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
        ?>
        <div class="mt-4">
          <button class="button" onclick="openPopup()"> Ajukan Penawaran!</button>
          <div class="container">
            <div class="popup-content" id="popup-content">

              <img src="img/1.png">
  
              <br>
              <br>
  
              <button class="bckBtn" onclick="closePopup()">
              </button>
              <h2>Tertarik dengan bisnis ini ?</h2>
              <p>Anda ingin mengajukan penawaran untuk bisnis ini ?</p>
  
              <h2>Harga Bisnis</h2>
              <h2>Rp <?php echo $harga ?></h2>
              
              <br>
              <br>
              <br>

              <form action="productFunction.php?id=<?php echo $id?>" method="POST">
                <div class="row">
                  <div class="col">
                    <h5>Harga Tawaran Anda</h5>
                    <div class="inputDiv">
                        <h5>Rp</h5>
                        <input required name="nominal" id="tanpa-rupiah" class="form-control ms-2 mb-4 w-100" type="text" placeholder="Nominal"
                        onkeypress="return onlyNumberKey(event)" autocomplete="off">
                    </div>
                    <div class="col">
                    <h5>Telepon </h5>
                    <div class="inputDiv">
                        <input required name="notelp" id="notelp" class="form-control mb-2 w-100" type="text" placeholder="Nomor yang bisa dihubungi (max 15 digit)"
                        onkeypress="return onlyNumberKey(event)" autocomplete="off" maxlength="15">
                    </div>
                  </div>
                </div>
              </div>
              <hr>
                <div class="btnDiv">
                    <button type="submit" name="submit" id="submit" onclick="popupConf();" style="width: 100%;" class="buttonAjukan"> Ajukan</button>
                </div> 
              </form>
              <script>
                function onlyNumberKey(evt) {
                  // Only ASCII character in that range allowed
                  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                  return true;
                }

                function popupConf() {
                  confirm("Anda yakin akan mengajukan penawaran ke bisnis ini?");
                }
              </script>
  
              <script>
                let popup = document.getElementById("popup-content");
  
                function openPopup() {
                  popup.classList.add("open-popup-content");
                }
  
                function closePopup() {
                  popup.classList.remove("open-popup-content");
                }
                
                var tanpa_rupiah = document.getElementById('tanpa-rupiah');
                  tanpa_rupiah.addEventListener('keyup', function(e)
                  {
                      tanpa_rupiah.value = formatRupiah(this.value);
                  });
                  function formatRupiah(angka, prefix)
                  {
                      var number_string = angka.replace(/[^,\d]/g, '').toString(),
                          split    = number_string.split(','),
                          sisa     = split[0].length % 3,
                          rupiah     = split[0].substr(0, sisa),
                          ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                          
                      if (ribuan) {
                          separator = sisa ? '.' : '';
                          rupiah += separator + ribuan.join('.');
                      }
                      
                      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                  }
              </script>
            </div>
          </div>     
        </div>
        <?php
        } else {
          echo "
          <div class='mt-4'>
            <p style='text-align: center; font-family: Arial; font-size: 15px; color: red;'>Harap login terlebih dahulu menggunakan akun Investor untuk mengajukan penawaran!</p>
          </div>
          ";
        }

        ?>
      </div>
    </div>

    <!-- detail produk -->
    <div class="row mt-5">
      <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
              role="tab" aria-controls="home" aria-selected="true">Detail Produk</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
              role="tab" aria-controls="profile" aria-selected="false">Hubungi Penjual</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h5><strong>Deskripsi Bisnis:</strong></h5>
            <p><?php echo $deskripsi?></p>
            <h5> <strong> Fitur Bisnis:</strong></h5>
            <p> <?php echo $fitur?></p>
            <h5> <strong> Benda:</strong></h5>
            <p><?php echo $benda?></p>

            <?php
            if ($mapLat && $mapLng != NULL || $mapLat && $mapLng > 0) {

            
            ?>

            <h5> <strong> Geografi dan lokasi:</strong></h5>

            <div class="bg-secondary rounded">
              <!-- Ini Google Maps API -->

              <div id="map"></div>

              <script>

                let map;

                function initMap() {
                  map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: <?php echo $mapLat?>, lng: <?php echo $mapLng?> },
                    zoom: 16,
                  });

                  marker = new google.maps.Marker({
                    position: { lat: <?php echo $mapLat?>, lng: <?php echo $mapLng?> },
                    map,
                    title: "Lokasi Bisnis"
                  });

                }

                window.initMap = initMap;

              </script>
              <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-PwRDurA8RKCXaa-c0qmmLicEZ5AGFWU&callback=initMap">
                </script>

            </div>

            <br>
            <?php
            }
            
            ?>      
            <h5><strong> Kota</strong></h5>
            <p> <?php echo $kota?> </p>
            <h5> <strong> Alamat</strong></h5>
            <p> <?php echo $alamat?> </p>
            <br>
            <div class="bg-secondary p-3 rounded" style="color: white;">
              <h3>Informasi keuangan</h3>
              <h5>Rata-rata per bulan</h5>
              <p> Rp <?php echo $rataPerB?></p>
              <h5>Rata-rata per tahun</h5>
              <p> Rp <?php echo $rataPerT?></p>
            </div>
            <br>
          </div>
          <div class="tab-pane fade p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php
            if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {

            ?>
            <h5> <strong> Nama pemilik:</strong></h5>
            <p> <?php echo $namaPemilik ?></p>
            <h5> Jenis:</h5>
            <p> <?php echo $jenis ?></p>
            <h5> Telepon:</h5>
            <p> <?php echo $notelp ?></p>
            <?php
            } else {
              echo '
              <h5> <strong> Nama pemilik:</strong></h5>
              <p style="color: red;"> harap login terlebih dahulu</p>
              <h5> Jenis:</h5>
              <p> '.$jenis.'</p>
              <h5> Telepon:</h5>
              <p style="color: red;"> harap login terlebih dahulu</p>
              ';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- detail produk -->
  </div>
  <!-- Product -->

  <!-- Footer -->
  <footer class="bg-dark p-5 position-sticky top-100">
    <div class="container">
      <div class="row">
        <div class="col" style="text-align: center;">
          <img src="img/1.png" style="width: 30px;">
          <span style="color: white;">Copyright &copy; 2022 Midnightcoder</span>
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
