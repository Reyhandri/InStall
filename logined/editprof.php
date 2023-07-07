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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" type="text/css" href="editprof.css">
  <link rel="icon" href="../img/1.png" type ="image/x-icon">
  <script src="https://kit.fontawesome.com/c771d4a038.js" crossorigin="anonymous"></script>

  <title>MidnightCoder</title>
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
            <a class="nav-link" aria-current="page" href="../index.php">Beranda</a>
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
                          <a class='nav-link' href='histori.php' style='color: lightblue;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='histori.php' style='color: lightblue;'>Bisnis Anda</a>
                        ";
                }
              }
            ?>
        </ul>
        <ul class="navbar-nav ms-auto">    
          <li class="nav-item">
              <?php
                if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
                  $email = $_SESSION['email'];
                  echo '
                    <li class="nav-item">
                      <img src="userimg/user-' .$idPengguna. '.jpg" class="rounded-circle" onError="this.src = \'../img/1.png\'" style="width:40px; height:40px">
                    </li> 
                    <li class="nav-item">
                      <a href="../logined/profile.php" class="nav-link">'.$email.'</a>
                    </li>
                    <li class="nav-item">
                      <a href="../logout.php" class="nav-link" style="color: red;">Logout</a>
                    </li>
                    ';
                } else {
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link fa-solid fa-user' href='../register.php'> Daftar</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link fa-solid fa-right-to-bracket' href='../login.php'> Masuk</a>
                    </li>
                    ";
                 }
              ?>   
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

<!-- Isi -->
  <?php
    include "../connect.php";

    $sql = "SELECT * FROM pengguna WHERE id='$idPengguna'";
    $hasil = mysqli_query($conn, $sql);
    $baris = mysqli_fetch_assoc($hasil);
    $jenis = $_SESSION['jenis'];
  ?>
  
  <div class="container bg-light mt-5 mb-5 pt-4 pb-4">
    <h4 class="topT">Edit Profile</h4>
    <br>
    <div class="row">
      <div class="col-md-6">
          <div class="cardP" style="width: 18rem;">
            <hr style="border-style: none; color: transparent;">
            <img src="userimg/user-<?php echo $idPengguna; ?>.jpg" onError="this.src = '../img/1.png'" width="100" height="100" class="rounded-circle">
            <div class="card-body">
              <form action="editprofFunction.php" method="POST">
                <hr>
                <h5 class="card-title">Foto Profile</h5>
                <p class="card-text">Untuk mengganti foto profil anda silahkan klik dibawah ini</p>
                <div class="delp">
                  <button type="submit" class="buttonHP" name="removePic">Hapus Foto</button>
                </div> 
              </form>  
              <form action="editprofFunction.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col">
                    <div class="upload">
                      <button type="button" id="upload" class="buttonFP">Upload</button>  
                      <input hidden="hidden" class="fileP" type="file" name="image" id="image" accept="image/*"> 
                    </div>         
                  </div>
                  <div class="col">
                    <button type="submit" name="changePic" class="buttonP">Ganti Foto</button>
                  </div>
                  <hr style="border-style: none; color: transparent;">
                  <span id="picname">Pilih File ...</span>

                  <script type="text/javascript">
                    const realInpFile = document.getElementById("image");
                    const uploadBtn = document.getElementById("upload");
                    const picName = document.getElementById("picname");

                    uploadBtn.addEventListener("click", function() {
                      realInpFile.click();
                    }) 

                    realInpFile.addEventListener("change", function() {
                      if (realInpFile.value) {
                        picName.innerHTML = realInpFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
                        picName.style.color = 'lightgreen';
                      } else {
                        picName.innerHTML = "Pilih File ...";
                        picName.style.color = 'white';
                      }
                    })
                  </script>
                </div>
              </form>      
            </div>        
          </div>       
      </div>
      <br>
      <br>
      <div class="col">
        <div class="row">
            <div class="col">
              <div class="form">
                <fieldset>
                  <legend>Ganti Bio</legend>
                  
                  <form action="editprofFunction.php" method="POST">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Lengkap</label>
                      <input class="input" required type="text" id="nama" name="nama" <?php

                      $sql = "SELECT * FROM pengguna WHERE id=$idPengguna";
                      $hasil = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_assoc($hasil);
                      $name = $row['nama'];

                      echo "value='$name'";
                      ?>>
                    </div>
                    <div class="mb-3">
                      <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                      <input class="input" type="date" id="tglLahir" name="tglLahir"
                      <?php
                      $tglLahir = $row['tglLahir'];

                      echo "value='$tglLahir'";
                      ?>>
                    </div>
                    <div class="mb-3">
                      <label for="notelp" class="form-label">Nomor Telepon</label>
                      <input class="input" onkeypress="return onlyNumberKey(event)" autocomplete="off" type="text" id="notelp" name="notelp" <?php
                      $tglLahir = $row['tglLahir'];

                      echo "value='$tglLahir'";
                      ?>>   
                      <script>
                        function onlyNumberKey(evt) {
                          // Only ASCII character in that range allowed
                          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                            return false;
                          return true;
                        }
                      </script>
                    </div>
                    <div class="mb-3">
                      <label for="domisili" class="form-label">Domisili</label>
                      <input class="input" type="text" id="domisili" name="domisili" <?php
                      $domisili = $row['domisili'];

                      echo "value='$domisili'";
                      ?>>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input class="input" required id="password" type="password" name="password">
                      <i class="bi bi-eye-slash" id="togglePassword"></i>  
                      <!-- <p id="notif" name="notif">wrong password notif</p> -->
                        <script>
                          // Show and Hide Password
                          const togglePassword = document.querySelector("#togglePassword");
                          const password = document.querySelector("#password");

                          togglePassword.addEventListener("click", function () {
                              // toggle the type attribute
                              const type = password.getAttribute("type") === "password" ? "text" : "password";
                              password.setAttribute("type", type);
                              
                              // toggle the icon
                              this.classList.toggle("bi-eye");
                          });

                          // prevent form submit
                          const form = document.querySelector("form");
                          form.addEventListener('submit', function (e) {
                              e.preventDefault();
                          });
                        </script>
                      </div>
                    <button type="submit" name="gantiBio" id="gantiBio" class="button">Ganti Bio</button>
                  </form>
                </fieldset>  
            </div>
          </div>
          <div class="col">
            <div class="form">
              <fieldset>
                <legend>Ganti Password</legend>
                <form action="editprofFunction.php" method="POST">
                <script>
                  var check = function(){
                      if(document.getElementById('passwordb').value ==
                      document.getElementById('passwordbk').value) {
                          document.getElementById('notif').style.color = 'green';
                          document.getElementById('notif').innerHTML = 'Password Sama';
                      } else {
                          document.getElementById('notif').style.color = 'red';
                          document.getElementById('notif').innerHTML = 'Password Tidak Sama';
                      }

                      if(document.getElementById('passwordb').value == "" &&
                      document.getElementById('passwordbk').value == "") {
                        document.getElementById('notif').innerHTML = "";
                      }
                    }
                </script>
                <div class="mb-3">
                  <label for="password" class="form-label">Password Lama</label>
                  <input class="input" required id="password" type="password" name="password">
                </div>
                <div class="mb-3">
                  <label for="passwordb" class="form-label">Password Baru</label>
                  <input class="input" required onkeyup='check();' id="passwordb" type="password" name="passwordb">
                </div>
                <div class="mb-3">
                  <label for="passwordbk" class="form-label">Konfirmasi Password Baru</label>
                  <input class="input" required onkeyup='check();' id="passwordbk" type="password" name="passwordbk">
                  <p id="notif" class="notif"></p>
                </div>
                <button type="submit" id="gantiPass" name="gantiPass" class="button">Ganti Password</button>
              </form>
              </fieldset>
            </div>     
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Isi -->  


  <!-- Footer -->
  <footer class="bg-dark p-5 position-sticky top-100">
    <div class="container">
      <div class="row">
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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    $('#image').change(function() {
            var i = $(this).prev('button').clone();
            var file = ($('#image')[0].files[0].name).substring(0, 5) + "..";
            $(this).prev('button').text(file);
        });
  </script>


</body>

</html>