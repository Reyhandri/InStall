<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" type="text/css" href="uploadBisnis.css" />
    <link rel="icon" href="../img/1.png" type="image/x-icon" />
    <script
      src="https://kit.fontawesome.com/c771d4a038.js"
      crossorigin="anonymous"
    ></script>

    <title>InStall</title>
  </head>

  <body>
    <?php
    include "../connect.php";

    if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
      $idPengguna = $_SESSION['id'];
    }
    ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
      <div class="container">
        <a class="navbar-brand" href="../index.php">
          <img src="../img/1.png" alt="" width="50" height="50" class="me-2" />
          <strong>InStall</strong>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.php"
                >Beranda</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://wa.me/+628886964888">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../us.html">About Us</a>
            </li>
            <?php
              if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
                $jenis = $_SESSION['id_jenis'];
                if ($jenis == 2) {
                  echo "
                          <a class='nav-link' href='histori.php' style='color: black;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='histori.php' style='color: black;'>Bisnis Anda</a>
                          <li>
                          <a class='nav-link' href='kelola.php' style='color: black;'>Bahan Baku</a>
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
                            <img src="userimg/user-' . $idPengguna . '.jpg" class="rounded-circle" onError="this.src = \'../img/1.png\'" style="width:40px; height:40px">
                          </li> 
                          <li class="nav-item">
                            <a href="profile.php" class="nav-link">' . $email . '</a>
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

    <div class="container bg-light mt-5 mb-5 pt-4 pb-4">
      <h4 class="topT">Upload Bisnis</h4>
      <br/>
      <form action="uploadFunction.php" method="POST">
      <div class="row">
        <div class="col-md-6">
          <div class="cardP" style="width:22rem"  >
            <hr style="border-style: none; color: transparent" />
            <img
              src="<?php echo '../product/prod-' . $idPengguna . '.jpeg';?>"
              onError="this.src = '../img/1.png'"
              width="450"
              height="370"
              class="img-fluid"
              id="preview"
            />
            <div class="card-body">
                <hr />
                <h5 class="card-title">Foto Bisnis</h5>
                <p class="card-text">
                  Upload foto bisnis anda disini
                </p>
                <hr>
              <form
                action="editprofFunction.php"
                method="POST"
                enctype="multipart/form-data"
              >
                <div class="row">
                  <div class="col">
                    <div class="upload">
                      <button type="button" id="upload" class="buttonFP">
                        Upload
                      </button>
                      <input
                        hidden="hidden"
                        class="fileP"
                        type="file"
                        name="image"
                        id="image"
                        accept="image/*"
                      />
                    </div>
                  </div>
                  <hr style="border-style: none; color: transparent" />
                  <span id="picname">Pilih File ...</span>

                  <script type="text/javascript">
                    const realInpFile = document.getElementById("image");
                    const uploadBtn = document.getElementById("upload");
                    const picName = document.getElementById("picname");

                    uploadBtn.addEventListener("click", function () {
                      realInpFile.click();
                    });

                    realInpFile.addEventListener("change", function () {
                      if (realInpFile.value) {
                        picName.innerHTML = realInpFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
                        picName.style.color = "lightgreen";
                      } else {
                        picName.innerHTML = "Pilih File ...";
                        picName.style.color = "white";
                      }
                    });

                    image.onchange = evt => {
                      const [file] = image.files
                      if (file) {
                        preview.src = URL.createObjectURL(file)
                      }
                    }
                  </script>
                </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="row"> 
            <div class="col">
              <div class="form">                  
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Bisnis</label>
                      <input 
                        class="input" 
                        required 
                        type="text" 
                        id="nama"
                        name="nama"
                        autocomplete="off"
                        >
                    </div>
                    <div class="mb-3">
                      <label for="tglLahir" class="form-label"
                        >Tahun Bisnis Didirikan</label
                      >
                      <input
                        class="input"
                        type="number"
                        max="2022"
                        maxlength="4"
                        placeholder="jarak (1901-2155)"
                        id="tahun"
                        name="tahun"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="notelp" class="form-label"
                        >Nomor Telepon</label
                      >
                      <input
                        class="input"
                        onkeypress="return onlyNumberKey(event)"
                        autocomplete="off"
                        type="text"
                        maxlength="15"
                        id="notelp"
                        name="notelp"
                        placeholder="yang bisa dihubungi"
                        required
                      />
                      <script>
                        function onlyNumberKey(evt) {
                          // Only ASCII character in that range allowed
                          var ASCIICode = evt.which ? evt.which : evt.keyCode;
                          if (
                            ASCIICode > 31 &&
                            (ASCIICode < 48 || ASCIICode > 57)
                          )
                            return false;
                          return true;
                        }
                      </script>
                      
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label"
                        >Deskripsi Singkat</label
                      >
                      <textarea
                        required
                        name="deskripsi"
                        id="deskripsi"
                        cols="26"
                        rows="3"
                        class="input"
                        maxlength="160"
                        placeholder="Deskripsi singkat bisnis anda (maks 160 karakter)"
                      ></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="fitur" class="form-label">Fitur Bisnis</label>
                      <textarea
                        name="fitur"
                        id="fitur"
                        cols="26"
                        rows="3"
                        class="input"
                      ></textarea>
                    </div> 
                    <div class="mb-3">
                      <label for="Harga" class="form-label">Harga (Rp)</label>
                      <input
                        class="input"
                        required
                        onkeypress="return onlyNumberKey(event)"
                        placeholder="Satuan Rp (Rupiah)"
                        id="tanpa-rupiah"
                        type="text"
                        name="harga"
                      />
                      <script>
                        
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
                    <div class="mb-3">
                      <label for="Harga" class="form-label">Rata-Rata (Rp)</label>
                      <input
                        class="input"
                        required
                        onkeypress="return onlyNumberKey(event)"
                        placeholder="Rata-rata / bulan"
                        id="tanpa-rupiah2"
                        type="text"
                        name="rataB"
                      />
                      <input
                        class="input"
                        required
                        onkeypress="return onlyNumberKey(event)"
                        placeholder="Rata-rata / tahun"
                        id="tanpa-rupiah3"
                        type="text"
                        name="rataT"
                      />
                      <script>
                        var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
                          tanpa_rupiah2.addEventListener('keyup', function(e)
                          {
                              tanpa_rupiah2.value = formatRupiah(this.value);
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
                      <script>
                        var tanpa_rupiah3 = document.getElementById('tanpa-rupiah3');
                          tanpa_rupiah3.addEventListener('keyup', function(e)
                          {
                              tanpa_rupiah3.value = formatRupiah(this.value);
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
            <div class="col">
              <div class="form">
              <div class="mb-3">
                  <label for="bentuk" class="form-label">Bentuk</label>
                  <input
                    name="bentuk"
                    id="bentuk"
                    cols="26"
                    rows="3"
                    placeholder="cth: Restoran, Toko, Kantor"
                    class="input"
                    required
                  >
                </div>
                <div class="mb-3">
                  <label for="pendapatan" class="form-label">Pendapatan (Rp)</label>
                  <input
                    name="pendapatan"
                    id="tanpa-rupiah4"
                    cols="26"
                    rows="3"
                    placeholder="Pendapatan /bulan"
                    class="input"
                    required
                  >
                  <script>
                        
                        var tanpa_rupiah4 = document.getElementById('tanpa-rupiah4');
                          tanpa_rupiah4.addEventListener('keyup', function(e)
                          {
                              tanpa_rupiah4.value = formatRupiah(this.value);
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
                <div class="mb-3">
                  <label for="benda" class="form-label">Benda</label>
                  <input
                    name="benda"
                    id="benda"
                    class="input"
                  >
                </div>
                <div class="mb-3">
                  <label for="kota" class="form-label">Kota</label>
                  <input
                    name="kota"
                    id="kota"
                    class="input"
                    required
                  >
                </div>         
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea
                    type="text"
                    name="alamat"
                    id="alamat"
                    cols="30"
                    rows="3"
                    class="input"
                    required
                  ></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Lokasi Bisnis (opsional)</label>
                  <input
                    type="text"
                    name="lat"
                    id="lat"
                    placeholder="Latitude (Lat)"
                    cols="30"
                    rows="3"
                    class="input"
                  />
                  <input
                    type="text"
                    name="lng"
                    id="lng"
                    placeholder="Longitude (Lng)"
                    cols="30"
                    rows="3"
                    class="input"
                  />
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="input" style="width: 90%;" name="status" id="status">
                    <option style="text-align: center;" value="" disabled selected>-- Pilih Status Bisnis --</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="jenis" class="form-label">Jenis</label>
                  <select class="input" style="width: 90%;" name="jenis" id="jenis">
                  <option style="text-align: center;" value="" disabled selected>-- Pilih Jenis Bisnis --</option>
                    <option value="Pemilik">Pemiliki</option>
                    <option value="Sewa">Sewa</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> 
    <div class="container">
      <div class="mt-5">
        <button id="submit" name="submit" type="submit" class="daftar">Daftarkan</button>
      </div>
    </div>
    </form>
  </div>
  
</div>
    <!-- Isi -->

    <!-- Footer -->
    <footer class="bg-warning p-5 position-sticky top-100">
      <div class="container">
        <div class="row">
          <div class="col" style="text-align: center">
            <img src="../img/1.png" style="width: 30px" />
            <span style="color: white"
              >Copyright &copy; 2023 Barudak Sistem</span
            >
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script>
      $("#image").change(function () {
        var i = $(this).prev("button").clone();
        var file = $("#image")[0].files[0].name.substring(0, 5) + "..";
        $(this).prev("button").text(file);
      });
    </script>
  </body>
</html>
