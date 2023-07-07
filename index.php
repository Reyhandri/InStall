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
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" href="img/1.png" type ="image/x-icon">
  <style>
#buttons {
  text-align: center;
  margin: 20px 0;
}

.button {
  display: inline-block;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background-color: #fff;
  margin: 10px;
  padding: 10px;
  box-sizing: border-box;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
}

.button img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
}

.button p {
  margin: 5px 0;
  font-size: 12px;
  color: #808080;
  font-family: 'Roboto', sans-serif;
  transition: color 0.3s ease;
}

.button:hover {
  transform: scale(1.1);
}

.button:hover p {
  color: #ff69b4;
}

#location {
  text-align: center;
  margin: 20px 0;
}

#search-location {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
}

#search-location input[type="text"] {
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

#search-location button {
  background-color: transparent;
  border: none;
  padding: 0;
  margin-left: 10px;
  cursor: pointer;
  transition: transform 0.3s ease;
}

#search-location button img {
  width: 24px;
  height: 24px;
}

#search-location button:hover {
  transform: scale(1.1);
}
  </style>

  <title>InStall</title>
</head>

<body>

  <?php
    if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
      $idPengguna = $_SESSION['id'];
    }

  include "connect.php";
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
            <a font-weight:bold class="nav-link" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a font-weight:bold class="nav-link" href="https://wa.me/+628886964888">Kontak</a>
          </li>
          <li class="nav-item">
            <a font-weight:bold class="nav-link" href="us.html">About Us</a>
          </li>
          <li>
          <?php
              if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
                $jenis = $_SESSION['id_jenis'];
                if ($jenis == 2 || $jenis == 4) {
                  echo "
                          <a class='nav-link' href='logined/histori.php' style='color: white;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='logined/histori.php' style='color: #c62298;'>Bisnis Anda</a>
                          <li>
                          <a class='nav-link' href='logined/kelola.php' style='color: #c62298;'>Bahan Baku</a>
                          </li>
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

   <!-- Carousel -->
  <div class="row bg-warning">
    <div class="col-1"></div>
    <div class="col-12" style="margin:0px 0">
      <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner d-none d-lg-block">
          <div class="carousel-item active">
            <img src="img/ppp.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/hl1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/hl2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/hl3.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <div class="carousel-inner d-block d-md-block d-lg-none">
          <div class="carousel-item active">
            <img src="img/22.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/hl1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/hl2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/hl3.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div> 
  <!-- Carousel -->

   <!-- quick -->
  <div class="container" style="user-select: auto">
    <br>
    <div id="location">
        <h2>Pilih Lokasi Anda:</h2>
        <div id="search-location">
            <input type="text" placeholder="Cari lokasi">
            <button><img src="img/lokasisaya.png" alt="Tombol Lokasi"></button>
        </div>
    </div>

    <div id="buttons">
        <h2>Pilihan Tombol:</h2>
        <div class="button">
            <a href="#"><img src="img/lokasi.png" alt="Tombol Lokasi"></a>
            <p class="pink-text">Lokasi Terdekat</p>
        </div>
        <div class="button">
            <a href="#"><img src="img/Promo.jpg" alt="Tombol Promo"></a>
            <p class="pink-text">Promo Makanan</p>
        </div>
        <div class="button">
            <a href="#"><img src="img/ongkir.png" alt="Tombol Gratis Ongkir"></a>
            <p class="pink-text">Gratis Ongkir</p>
        </div>
        <div class="button">
            <a href="#"><img src="img/start.png" alt="Tombol Favorit"></a>
            <p class="pink-text">Makanan Favorit</p>
        </div>
    </div>
  </div>
 <!-- quick -->
  
  <!-- restoran -->
  <div id="top-rated-restaurants">
        <h2>Restoran dengan Rating Tertinggi:</h2>
        <div class="restaurant-item">
            <a href="#">
                <img src="img/kfc.png" alt="Restoran 1">
                <h3>Nama Restoran 1</h3>
                <div class="rating">
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span>
                    <p>4.5</p>
                </div>
            </a>
        </div>
        <div class="restaurant-item">
            <a href="#">
                <img src="img/king.png" alt="Restoran 2">
                <h3>Nama Restoran 2</h3>
                <div class="rating">
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span>
                    <span>&#9734;</span>
                    <p>4.3</p>
                </div>
            </a>
        </div>
        <div class="restaurant-item">
            <a href="#">
                <img src="img/solaria.jpg" alt="Restoran 3">
                <h3>Nama Restoran 3</h3>
                <div class="rating">
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <p>4.7</p>
                </div>
            </a>
        </div>
        <div class="restaurant-item">
            <a href="pakdatuk.php">
                <img src="img/pakdatuk.jpg" alt="Restoran 4">
                <h3>Makanan Pak Datuk</h3>
                <div class="rating">
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span>
                    <p>4.5</p>
                </div>
            </a>
        </div>
        <div class="restaurant-item">
            <a href="#">
                <img src="img/sederhana.jpeg" alt="Restoran 5">
                <h3>Sederhana</h3>
                <div class="rating">
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <p>4.9</p>
                </div>
            </a>
        </div>
    </div>
    <!-- restoran -->

    <!-- makanan -->
    <div id="recommended-food">
        <h2>Makanan Direkomendasikan:</h2>
        <div class="food-item">
            <a href="#"><img src="img/nasgor.jpeg" alt="Makanan 1"></a>
            <h3>Nasi Goreng</h3>
        </div>
        <div class="food-item">
            <a href="#"><img src="img/mieayam.jpe" alt="Makanan 2"></a>
            <h3>Mie Ayam</h3>
        </div>
        <div class="food-item">
            <a href="#"><img src="img/bakso.jpeg" alt="Makanan 3"></a>
            <h3>Bakso Telur</h3>
        </div>
        <div class="food-item">
            <a href="#"><img src="img/satekambing.jpg" alt="Makanan 4"></a>
            <h3>Sate Kambing</h3>
        </div>
        <br>
        <div class="food-item">
            <a href="#"><img src="img/ayamkfc.jpg" alt="Makanan 4"></a>
            <h3>KFC Super Besar</h3>
        </div>
        <div class="food-item">
            <a href="#"><img src="img/burger.jpg" alt="Makanan 4"></a>
            <h3>Cheeseburger</h3>
        </div>
        <div class="food-item">
            <a href="#"><img src="img/rendang.jpeg" alt="Makanan 4"></a>
            <h3>Nasi Rendang</h3>
        </div>
    </div>
    <!-- makanan -->

    <!-- Footer -->
    <footer class="bg-dark p-5 position-sticky top-100">
    <div class="container">
      <div class="row">
        <div class="col" style="text-align: center;">
          <img src="img/1.png" style="width: 30px;">
          <span style="color: white;">Copyright &copy; 2023 Barudak Sistem</span>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous">
  </script> 
  <script>
        const locationButton = document.querySelector('#search-location button');
        const locationInput = document.querySelector('#search-location input[type="text"]');
        locationButton.addEventListener('click', getLocation);

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation tidak didukung oleh browser Anda.");
            }
        }

        function showPosition(position) {
            locationInput.value = "Jl. Kaliurang km 14.5, Sleman, Yogyakarta 55584";
        }
  </script>  
</body>
</body>

</html>