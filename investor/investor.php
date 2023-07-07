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
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="icon" href="../img/1.png" type ="image/x-icon">

  <title>InStall</title>
</head>

<body>

  <?php
    if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
      $idPengguna = $_SESSION['id'];
    }

  include "../connect.php";
  ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    <div class="container">
      <a class="navbar-brand" href="investor.php">
        <img src="../img/1.png" alt="" width="50" height="50" class="me-2">
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
            <a font-weight:bold class="nav-link" aria-current="page" href="investor.php">Beranda</a>
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
                if ($jenis == 2) {
                  echo "
                          <a class='nav-link' href='../logined/histori.php' style='color: black;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='../logined/histori.php' style='color: black;'>Bisnis Anda</a>
                          <li>
                          <a class='nav-link' href='../logined/kelola.php' style='color: black;'>Bahan Baku</a>
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
                      <img src="../logined/userimg/user-' . $idPengguna . '.jpg" class="rounded-circle" onError="this.src = \'../img/1.png\'" style="width:40px; height:40px">
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
                      <a class='nav-link' href='../register.php'> Daftar</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='../login.php'> Masuk</a>
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
    <div class="col-10" style="margin:20px 0">
      <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner d-none d-lg-block">
          <div class="carousel-item active">
            <img src="../img/ppp.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../img/ppp.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../img/ppp.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <div class="carousel-inner d-block d-md-block d-lg-none">
          <div class="carousel-item active">
            <img src="../img/22.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../img/22.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../img/22.png" class="d-block w-100" alt="...">
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

  <!-- Content -->
  <div class="container" style="user-select: auto">
    <br>
    <div class="row align-items-center" style="user-select: auto">
      <div class="col-md-9 col-12 ins-cat-desc" style="user-select: auto">
        <h1 style="user-select: auto">Selamat Datang Investor</h1>
        <!-- <p style="user-select: auto">
          Menjalankan bisnis memang tidak mudah. Namun dengan artikel yang
          disajikan Jurnal Anda dapat memahami bisnis mulai dari tips bisnis
          startup, strategi bisnis, membuat bisnis plan hingga implementasinya -->
        </p>
      </div>
    </div>
   <!-- <div class="blog_wrap row" style="user-select: auto">
      <div class="col-lg-4" style="user-select: auto">
        <div class="ins-blog-item" style="user-select: auto">
          <div class="ins-blog-item-img" style="user-select: auto">
            <a class="blog_item-img lazyload lazyloaded"
              data-bg="https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414.jpg"
              href="https://www.jurnal.id/id/blog/strategi-biaya-pengiriman/" style="
                   background-image: url('https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414.jpg');
                   user-select: auto;
                 "></a>
          </div>
          <div class="ins-blog-item-img" style="user-select: auto">
            <a class="blog_item-img lazyload lazyloaded"
              data-bg="https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414.jpg"
              href="https://www.jurnal.id/id/blog/strategi-biaya-pengiriman/" style="
                   background-image: url('https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414.jpg');
                   user-select: auto;
                 "></a>
          </div>

          <div class="ins-blog-item-content" style="user-select: auto">
            <!--div class="ins-blog-item-content-cat"><a href="https://www.jurnal.id/category/bisnis">Bisnis</a></di> 1

            <p style="user-select: auto">
              <img class="aligncenter wp-image-9893 entered lazyloaded"
                src="https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg"
                alt="Tips dan Strategi Menentukan Biaya Pengiriman" width="380" height="233"
                data-lazy-srcset="https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg.jpg 1000w,https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg 1200w,https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg 1178w"
                data-lazy-sizes="(max-width: 800px) 100vw, 800px"
                data-lazy-src="https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg"
                data-ll-status="loaded" sizes="(max-width: 800px) 100vw, 800px" srcset="
                   https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg 1000w,
                   https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg 1200w,
                   https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg 1178w
                   " style="user-select: auto" /><noscript style="user-select: auto"><img
                  class="aligncenter wp-image-9893"
                  src="https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg"
                  alt="Tips dan Strategi Menentukan Biaya Pengiriman" width="380" height="233" srcset="
                     https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg 1000w,
                     https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg 1200w,
                     https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_380086414-1000x417.jpg 1178w
                     " sizes="(max-width: 800px) 100vw, 800px" /></noscript>
            </p>
            <div class="ins-blog-item-content-cat" style="user-select: auto">
              <a href="https://www.jurnal.id/id/blog/category/bisnis/" rel="category tag"
                style="user-select: auto">Bisnis</a>
            </div>
            <div class="ins-blog-item-content-title" style="user-select: auto">
              <a href="https://www.jurnal.id/id/blog/strategi-biaya-pengiriman/" style="user-select: auto">6 Tips dan
                Strategi Menentukan Biaya Pengiriman</a>
            </div>
            <div class="ins-blog-item-content-desc" style="user-select: auto">
              <p style="user-select: auto">
                Bagaimana cara menentukan ongkos kirim atau biaya pengiriman
                agar menguntungkan bagi pembeli dan juga Anda…<br style="user-select: auto" />
              <div class="mt-4"><a href="https://www.jurnal.id/id/blog/strategi-biaya-pengiriman/"
                  style="user-select: auto" class="button">Lihat Menu</a>
              </div>
              </p>
            </div>
            <div class="ins-blog-item-content-meta" style="user-select: auto">
              <div class="ins-blog-item-content-meta-author" style="user-select: auto">
                BY <b style="user-select: auto">Ucig</b>
              </div>
              <div class="ins-blog-item-content-meta-date" style="user-select: auto">
                24 Nov 2022
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" style="user-select: auto">
        <div class="ins-blog-item" style="user-select: auto">
          <div class="ins-blog-item-img" style="user-select: auto">
            <a class="blog_item-img lazyload lazyloaded"
              data-bg="https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_365362820.jpg"
              href="https://www.jurnal.id/id/blog/jenis-pelatihan-dan-pengembangan-sdm-bagi-perusahaan/" style="
                   background-image: url('https://www.jurnal.id/wp-content/uploads/2019/12/shutterstock_365362820.jpg');
                   user-select: auto;
                 "></a>
          </div>
          <div class="ins-blog-item-content" style="user-select: auto">
            <p style="user-select: auto">
              <img class="aligncenter wp-image-9893 entered lazyloaded"
                src="https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg"
                alt="Tips dan Strategi Menentukan Biaya Pengiriman" width="380" height="233"
                data-lazy-srcset="https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1000w,https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1200w,https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1178w"
                data-lazy-sizes="(max-width: 800px) 100vw, 800px"
                data-lazy-src="https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg"
                data-ll-status="loaded" sizes="(max-width: 800px) 100vw, 800px" srcset="
                   https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1000w,
                   https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1200w,
                   https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1178w
                   " style="user-select: auto" /><noscript style="user-select: auto"><img
                  class="aligncenter wp-image-9893"
                  src="https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg"
                  alt="Tips dan Strategi Menentukan Biaya Pengiriman" width="380" height="233" srcset="
                     https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1000w,
                     https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1200w,
                     https://www.jurnal.id/wp-content/uploads/2019/12/pelatihan-sdm-1000x563.jpg 1178w
                     " sizes="(max-width: 800px) 100vw, 800px" /></noscript>
            </p>
            <div class="ins-blog-item-content-cat" style="user-select: auto">
              <a href="https://www.jurnal.id/id/blog/category/bisnis/" rel="category tag"
                style="user-select: auto">Bisnis</a>,
              <a href="https://www.jurnal.id/id/blog/category/inspirasi/" rel="category tag"
                style="user-select: auto">Inspirasi</a>
            </div>
            <div class="ins-blog-item-content-title" style="user-select: auto">
              <a href="https://www.jurnal.id/id/blog/jenis-pelatihan-dan-pengembangan-sdm-bagi-perusahaan/"
                style="user-select: auto">7 Jenis Pelatihan dan Pengembangan SDM Bagi Perusahaan</a>
            </div>
            <div class="ins-blog-item-content-desc" style="user-select: auto">
              <p style="user-select: auto">
                Sebuah perusahaan yang hebat tentu membutuhkan Sumber Daya
                Manusia (SDM) yang hebat pula. Pada masa…<br style="user-select: auto" />
              <div class="  mt-4"><a
                  href="https://www.jurnal.id/id/blog/jenis-pelatihan-dan-pengembangan-sdm-bagi-perusahaan/"
                  style="user-select: auto" class="button" ;>Lihat Menu</a></div>
              </p>
            </div>
            <div class="ins-blog-item-content-meta" style="user-select: auto">
              <div class="ins-blog-item-content-meta-author" style="user-select: auto">
                BY <b style="user-select: auto">Dina Amalia</b>
              </div>
              <div class="ins-blog-item-content-meta-date" style="user-select: auto">
                24 Nov 2022
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" style="user-select: auto">
        <div class="ins-blog-item" style="user-select: auto">
          <div class="ins-blog-item-img" style="user-select: auto">
            <a class="blog_item-img lazyload lazyloaded"
              data-bg="https://www.jurnal.id/wp-content/uploads/2019/11/IG-Jurnal_Social-Media_NEW-TEMPLATE-08.jpg"
              href="https://www.jurnal.id/id/blog/2018-kelola-transaksi-penjualan-lebih-mudah-dengan-aplikasi-jurnal-touch/"
              style="
                   background-image: url('https://www.jurnal.id/wp-content/uploads/2019/11/IG-Jurnal_Social-Media_NEW-TEMPLATE-08.jpg');
                   user-select: auto;
                 "></a>
          </div>
          <div class="ins-blog-item-content" style="user-select: auto">
            <!--div class="ins-blog-item-content-cat"><a href="https://www.jurnal.id/category/bisnis">Bisnis</a></div> 2
            <p style="user-select: auto">
              <img class="aligncenter wp-image-9893 entered lazyloaded"
                src="https://www.jurnal.id/wp-content/uploads/2021/11/aplikasi-cetak-struk-gratis-jurnal-touch-860x628.png"
                alt="Tips dan Strategi Menentukan Biaya Pengiriman" width="380" height="233"
                data-lazy-srcset="https://www.jurnal.id/wp-content/uploads/2021/11/aplikasi-cetak-struk-gratis-jurnal-touch-860x628.png 1000w,https://www.jurnal.id/wp-content/uploads/2021/11/aplikasi-cetak-struk-gratis-jurnal-touch-860x628.png 1200w,https://www.jurnal.id/wp-content/uploads/2021/11/aplikasi-cetak-struk-gratis-jurnal-touch-860x628.png 1178w"
                data-lazy-sizes="(max-width: 800px) 100vw, 800px"
                data-lazy-src="https://www.jurnal.id/wp-content/uploads/2021/11/aplikasi-cetak-struk-gratis-jurnal-touch-860x628.png"
                data-ll-status="loaded" sizes="(max-width: 800px) 100vw, 800px" srcset="
                   https://www.jurnal.id/wp-content/uploads/2021/11/aplikasi-cetak-struk-gratis-jurnal-touch-860x628.png,
                   https://www.jurnal.id/wp-content/uploads/2021/11/aplikasi-cetak-struk-gratis-jurnal-touch-860x628.png 1200w,
                   https://www.jurnal.id/wp-content/uploads/2021/11/aplikasi-cetak-struk-gratis-jurnal-touch-860x628.png 1178w
                   " style="user-select: auto" /><noscript style="user-select: auto"><img
                  class="aligncenter wp-image-9893" src="nature-3082832.jpg"
                  alt="Tips dan Strategi Menentukan Biaya Pengiriman" width="380" height="233" srcset="
                       nature-3082832.jpg 1000w,
                       nature-3082832.jpg 1200w,
                       nature-3082832.jpg 1178w
                     " sizes="(max-width: 800px) 100vw, 800px" /></noscript>
            </p>
            <div class="ins-blog-item-content-cat" style="user-select: auto">
              <a href="https://www.jurnal.id/id/blog/category/bisnis/" rel="category tag"
                style="user-select: auto">Bisnis</a>,
              <a href="https://www.jurnal.id/id/blog/category/produk/" rel="category tag"
                style="user-select: auto">Produk</a>
            </div>
            <div class="ins-blog-item-content-title" style="user-select: auto">
              <a href="https://www.jurnal.id/id/blog/2018-kelola-transaksi-penjualan-lebih-mudah-dengan-aplikasi-jurnal-touch/"
                style="user-select: auto">Kelola Transaksi Penjualan Lebih Mudah dengan Aplikasi Jurnal
                Touch</a>
            </div>
            <div class="ins-blog-item-content-desc" style="user-select: auto">
              <p style="user-select: auto">
                Mengelola penjualan pada bisnis kecil mungkin akan terlihat
                mudah, tapi apakah akan tetap terlihat mudah…<br style="user-select: auto" />
                <br>
              <div class="  mt-4"><a
                  href="https://www.jurnal.id/id/blog/2018-kelola-transaksi-penjualan-lebih-mudah-dengan-aplikasi-jurnal-touch/"
                  style="user-select: auto" class="button">Lihat Menu</a></div>
              </p>
            </div>
            <div class="ins-blog-item-content-meta" style="user-select: auto">
              <div class="ins-blog-item-content-meta-author" style="user-select: auto">
                BY <b style="user-select: auto">Novia Widya Utami</b>
              </div>
              <div class="ins-blog-item-content-meta-date" style="user-select: auto">
                23 Nov 2022
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" style="user-select: auto">
        <div class="ins-blog-item" style="user-select: auto">
          <div class="ins-blog-item-img" style="user-select: auto">
            <a class="blog_item-img lazyload lazyloaded"
              data-bg="https://www.jurnal.id/wp-content/uploads/2020/04/shutterstock_1165851352.png"
              href="https://www.jurnal.id/id/blog/2018-5-langkah-mudah-melakukan-pembukuan-bagi-ukm/" style="
                   background-image: url('https://www.jurnal.id/wp-content/uploads/2020/04/shutterstock_1165851352.png');
                   user-select: auto;
                 "></a>
          </div>
        </div>
      </div>
    </div>-->
  </div>
  <!-- Content -->

  <br>

  <!-- Isi -->
  <div class="container bg-light mt-5" id="badan">
    <h1 style=" text-align: center; padding-top: 10px;">Rekomendasi Bisnis</h1>
    <hr>
    <div class="row justify-content-center align-items-center">

      <?php
      $sql = "SELECT * FROM bisnis";
      $hasil = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($hasil)) {
        $id = $row['id'];
        $nama = $row['nama'];
        $descr = $row['deskripsi'];
        echo '
        <div class="col-md-6 col-lg-4 col-12 text-center">
        <div class="card">
          <div class="face face1">
            <div class="content">
              <i class="fab fa-windows"></i>
              <img src="../img/1.png" alt="" width="300" height="200">
            </div>
          </div>
          <div class="face face2">
            <div class="content">
              <h3>'.$nama.'</h3>
              <p>'.$descr.'</p>
              <a href="../product.php?id='.$id.'" type="button">Read More</a>
            </div>
          </div>
        </div>
      </div>';
      }
      
      ?>
      </div>
    </div>
  <!-- isi -->

  <!-- Footer -->
  <footer class="bg-warning p-5 position-sticky top-100">
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

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>