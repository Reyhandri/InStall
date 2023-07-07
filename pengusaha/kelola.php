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
  <link rel="stylesheet" type="text/css" href="kelola.css">
  <link rel="icon" href="../img/1.png" type ="image/x-icon">
  <style>
    h1 {
    color: #c62298;
    text-align: center;
    animation: fade-in 1s ease;
  }
  th {
    background-color: #c62298;
    color: #fff;
  }
  input[type="submit"] {
    background-color: #c62298;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-radius: 5pt;
  }
  </style>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../img/1.png" alt="" width="50" height="50" class="me-2">
        <strong>InStall</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        
        <ul class="navbar-nav ms-auto">
          
          <li>
          <?php
              if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
                $jenis = $_SESSION['id_jenis'];
                if ($jenis == 2) {
                  echo "
                          <a class='nav-link' href='histori.php' style='color: black;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='pengusaha.php' style='color: white;'>Bisnis Anda</a>
                          <li>
                          <li>
                          <a class='nav-link' href='menu.php' style='color: white;'>Menu</a>
                          </li>
                          <a class='nav-link' href='kelola.php' style='color: #c62298;'>Kelola Stok</a>
                          </li>
                          <a class='nav-link' href='keuangan.php' style='color: white;'>Kelola keuangan</a>
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
                      <img src="logined/userimg/user-' . $idPengguna . '.jpg" class="rounded-circle" onError="this.src = \'../img/1.png\'" style="width:40px; height:40px">
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

  <br>

  <!-- Isi -->
  <!-- <div class="container bg-light mt-5" id="badan">
    <h1 style=" text-align: center; padding-top: 10px;">Rekomendasi Makanan</h1>
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
              <a href="product.php?id='.$id.'" type="button">Read More</a>
            </div>
          </div>
        </div>
      </div>';
      }
      
      ?>
      </div>
    </div> -->
  <!-- isi -->
  <div class="container">
    <h1 >Pengelolaan Produk Restoran</h1>

    <h2>Tambah Produk</h2>
    <form id="tambah-form" method="POST" action="updateStok.php" >
      <label for="nama">Nama Produk:</label>
      <input type="text" id="nama" name="nama" required>

      <label for="stok">Stok:</label>
      <input type="number" id="stok" name="stok" required>

      <input type="submit" value="Tambah">
    </form>

    <h2>Daftar Produk</h2>
    <table id="daftar-bahan-baku">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
        require "../connect.php";

        $sql = mysqli_query($conn, "SELECT * FROM menu");
        $count = mysqli_num_rows($sql);
                    
          if($count > 0) {
          while ($fetchData =  mysqli_fetch_array($sql)) {
            $idM = $fetchData['id_menu'];
            $namaM = $fetchData['nama_menu'];
            $hargaM = $fetchData['harga'];
            $stokM = $fetchData['stok'];
            echo "
            <tr>
              <td>$idM</td>
              <td>$namaM</td>
              <td>$hargaM</td>
              <td>$stokM</td>
              <td>
            <button class='edit-btn' onclick='editItem($stokM)'>Edit</button>
            <button class='delete-btn' onclick='deleteItem($stokM)'>Delete</button>
          </td>           
        </tr>";
          }} 
          ?>
      </tbody>
    </table>
  </div>

  <div class="popout-page" id="edit-popout">
    <div class="popout-page-content">
      <h2>Edit Produk</h2>
      <label for="popout-stok">Stok Baru:</label>
      <input type="number" id="popout-stok" name="popout-stok" required>
      <br>
      <button id="popout-submit">Simpan</button>
      <span class="popout-page-close">&times;</span>
    </div>
  </div>

  <script>
    //  const form = document.getElementById('tambah-form');
    // const table = document.getElementById('daftar-bahan-baku');
    // const tbody = table.querySelector('tbody');

    // form.addEventListener('submit', function(e) {
    //   e.preventDefault();

    //   const namaInput = document.getElementById('nama');
    //   const stokInput = document.getElementById('stok');
    //   const namaBahanBaku = namaInput.value;
    //   const stokBahanBaku = stokInput.value;

    //   const row = document.createElement('tr');
    //   const namaCell = document.createElement('td');
    //   namaCell.textContent = namaBahanBaku;
    //   const stokCell = document.createElement('td');
    //   stokCell.textContent = stokBahanBaku + ' pcs';
    //   const actionsCell = document.createElement('td');
    //   const editBtn = document.createElement('button');
    //   editBtn.classList.add('edit-btn');
    //   editBtn.textContent = 'Edit';
    //   const deleteBtn = document.createElement('button');
    //   deleteBtn.classList.add('delete-btn');
    //   deleteBtn.textContent = 'Hapus';

    //   editBtn.addEventListener('click', function() {
    //     const currentRow = this.parentNode.parentNode;
    //     const currentNamaBahanBaku = currentRow.querySelector('td:first-child').textContent;
    //     const currentStokBahanBaku = parseInt(currentRow.querySelector('td:nth-child(2)').textContent);

    //     const newStokBahanBaku = prompt(`Masukkan stok baru untuk ${currentNamaBahanBaku}:`, currentStokBahanBaku);
    //     if (newStokBahanBaku !== null) {
    //       currentRow.querySelector('td:nth-child(2)').textContent = newStokBahanBaku + ' pcs';
    //     }
    //   });

    //   deleteBtn.addEventListener('click', function() {
    //     const currentRow = this.parentNode.parentNode;
    //     currentRow.classList.add('delete-animation');
    //     setTimeout(() => {
    //       currentRow.remove();
    //     }, 300);
    //   });

    //   actionsCell.appendChild(editBtn);
    //   actionsCell.appendChild(deleteBtn);
    //   row.appendChild(namaCell);
    //   row.appendChild(stokCell);
    //   row.appendChild(actionsCell);
    //   tbody.appendChild(row);

    //   namaInput.value = '';
    //   stokInput.value = '';
    //   // Tambahkan kelas animasi saat menambahkan bahan baku
    //   row.classList.add('slide-in-animation');
    //   setTimeout(function() {
    //     row.classList.add('fade-in-animation');
    //   }, 500);
    // });

    const editBtns = document.querySelectorAll('.edit-btn');
    const deleteBtns = document.querySelectorAll('.delete-btn');

    editBtns.forEach(editBtn => {
      editBtn.addEventListener('click', function() {
        const currentRow = this.parentNode.parentNode;
        const currentNamaBahanBaku = currentRow.querySelector('td:first-child').textContent;
        const currentStokBahanBaku = parseInt(currentRow.querySelector('td:nth-child(2)').textContent);

        const newStokBahanBaku = prompt(`Masukkan stok baru untuk ${currentNamaBahanBaku}:`, currentStokBahanBaku);
        if (newStokBahanBaku !== null) {
          currentRow.querySelector('td:nth-child(2)').textContent = newStokBahanBaku + ' pcs';
        }
      });
    });

    deleteBtns.forEach(deleteBtn => {
      deleteBtn.addEventListener('click', function() {
        const currentRow = this.parentNode.parentNode;
        currentRow.classList.add('delete-animation');
        setTimeout(() => {
          currentRow.remove();
        }, 300);
      });
    });

    const popoutPage = document.getElementById('edit-popout');
    const popoutSubmitBtn = popoutPage.querySelector('#popout-submit');
    const popoutCloseBtn = popoutPage.querySelector('.popout-page-close');

    popoutSubmitBtn.addEventListener('click', function() {
      const popoutStokInput = popoutPage.querySelector('#popout-stok');
      const newStokBahanBaku = popoutStokInput.value;

      const currentRow = popoutPage.dataset.currentRow;
      const namaCell = table.rows[currentRow].cells[0];
      const stokCell = table.rows[currentRow].cells[1];
      stokCell.textContent = newStokBahanBaku + ' pcs';

      popoutPage.classList.remove('active');
      popoutStokInput.value = '';
    });

    popoutCloseBtn.addEventListener('click', function() {
      popoutPage.classList.remove('active');
    });


  </script>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>