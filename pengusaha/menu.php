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
  <link rel="stylesheet" type="text/css" href="menu.css">
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../img/1.png" alt="" width="50" height="50" class="me-2">
        <strong>InStall</strong>
      </a>
   
        <ul class="navbar-nav ms-auto">
          
          <?php
              if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
                $jenis = $_SESSION['id_jenis'];
                if ($jenis == 2 || $jenis == 4) {
                  echo "
                          <a class='nav-link' href='#' style='color: black;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='pengusaha.php' style='color: white;'>Bisnis Anda</a>
                          <li>
                          <li>
                          <a class='nav-link' href='menu.php' style='color: #c62298;'>Menu</a>
                          </li>
                          <a class='nav-link' href='kelola.php' style='color: white;'>Kelola Stok</a>
                          </li>
                          <a class='nav-link' href='keuangan.php' style='color: white;'>Kelola keuangan</a>
                          </li>
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

  <br>
<!-- isi -->
  <section id="menu">
    <h2>Menu Kami</h2>
    <div class="menu-list" id="menu-list">
    <?php
      require "../connect.php";
      $idPengusaha = $_SESSION['id'];
      // Get the maximum id_menu value from the menu table
      $sql = mysqli_query($conn, "SELECT MAX(id_menu) AS max_menu_id FROM menu WHERE id=$idPengusaha");
      $row = mysqli_fetch_assoc($sql);
      $max_menu_id = $row['max_menu_id'];

      // Generate an array of menu IDs from 1 to the maximum id_menu value
      $menuIds = range(1, $max_menu_id);

      foreach ($menuIds as $menuId) {
          // Retrieve menu details and count using a single query
          $sql = mysqli_query($conn, "SELECT nama_menu, harga, (SELECT COUNT(*) FROM menu WHERE id_menu = $menuId) AS menu_count FROM menu WHERE id_menu = $menuId");
          $row = mysqli_fetch_assoc($sql);

          $nama_menu = $row['nama_menu'];
          $harga = $row['harga'];
          $menu_count = $row['menu_count'];

          if ($menu_count > 0) {
              echo '
              <div class="menu-item">
                  <img src="../img/menu.png">
                  <h3>' . $nama_menu . '</h3>
                  <p> Rp. ' . $harga . '</p>
                  <button class="delete-button">Hapus</button>
              </div>';
          }
      }

      mysqli_close($conn);
      ?>
    </div>
    
  </section>

  <section id="add-menu">
    <h2>Tambahkan Menu Baru</h2>
    <form id="add-menu-form" enctype="multipart/form-data" action="functionMenu.php" method="POST">
      <input type="text" id="new-menu" placeholder="Nama Menu" required>
      <input type="text" id="new-menu-price" placeholder="Harga Menu" required>
      <button type="submit">Tambahkan</button>
    </form>
  
  </section>

  <section id="banner">
    <h1>Selamat Datang di Restoran XYZ</h1>
    <p>Nikmati beragam menu lezat kami</p>
  </section>

<!-- isi -->

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

<!-- JavaScript code -->
<script>
  const menuList = document.getElementById("menu-list");
  const addMenuForm = document.getElementById("add-menu-form");
  const searchMenuInput = document.getElementById("search-menu");

  function addNewMenu(event) {
    event.preventDefault();

    const newMenuInput = document.getElementById("new-menu");
    const newMenuName = newMenuInput.value;

    const newMenuPriceInput = document.getElementById("new-menu-price");
    const newMenuPrice = newMenuPriceInput.value;

    if (newMenuName && newMenuPrice) {
      const newMenuItem = document.createElement("div");
      newMenuItem.className = "menu-item";

      const menuImage = document.createElement("img");
        menuImage.src = "../img/menu.png";
        menuImage.alt = newMenuName;
        newMenuItem.appendChild(menuImage);

      const menuNameHeading = document.createElement("h3");
      menuNameHeading.textContent = newMenuName;
      newMenuItem.appendChild(menuNameHeading);

      const menuPriceParagraph = document.createElement("p");
      menuPriceParagraph.textContent = "Rp " + newMenuPrice;
      newMenuItem.appendChild(menuPriceParagraph);

      const deleteButton = document.createElement("button");
      deleteButton.className = "delete-button";
      deleteButton.textContent = "Hapus";
      newMenuItem.appendChild(deleteButton);

      menuList.appendChild(newMenuItem);
      newMenuInput.value = "";
      newMenuPriceInput.value = "";

      showSuccessNotification();
    } else {
      showErrorNotification("Harap lengkapi semua field!");
    }
  }

  function showSuccessNotification() {
    const notification = document.createElement("div");
    notification.className = "success-notification";
    notification.textContent = "Menu berhasil ditambahkan!";
    document.body.appendChild(notification);

    setTimeout(function () {
      document.body.removeChild(notification);
    }, 2000);
  }

  function showErrorNotification(message) {
    const notification = document.createElement("div");
    notification.className = "error-notification";
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(function () {
      document.body.removeChild(notification);
    }, 2000);
  }

  function deleteMenuItem(event) {
    if (event.target.classList.contains("delete-button")) {
      const menuItem = event.target.parentNode;
      menuItem.classList.add("fade-out");

      setTimeout(function () {
        menuItem.parentNode.removeChild(menuItem);
      }, 300);
    }
  }

  function filterMenu(event) {
    const searchText = event.target.value.toLowerCase();
    const menuItems = menuList.getElementsByClassName("menu-item");

    Array.from(menuItems).forEach(function (menuItem) {
      const menuName = menuItem.getElementsByTagName("h3")[0].textContent.toLowerCase();
      if (menuName.includes(searchText)) {
        menuItem.classList.remove("hidden");
      } else {
        menuItem.classList.add("hidden");
      }
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    addMenuForm.addEventListener("submit", addNewMenu);
    menuList.addEventListener("click", deleteMenuItem);
    searchMenuInput.addEventListener("input", filterMenu);
  });
</script>
  <!-- JavaScript code -->

  </body>

  </html>