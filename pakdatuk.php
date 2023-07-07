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
  <link rel="stylesheet" type="text/css" href="pakdatuk.css">
  <link rel="icon" href="img/1.png" type ="image/x-icon">
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
                          <a class='nav-link' href='logined/histori.php' style='color: #c62298;'>Histori</a>
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

  <!-- isi -->

  <div class="container">
    <div class="umkm-list">
      <div class="umkm-item">
        <img src="img/pakdatuk.jpg" alt="UMKM 1">
        <h3>Rumah Makan Pak Datuk</h3>
        <div class="rating">
          <span>&#9733;</span>
          <span>&#9733;</span>
          <span>&#9733;</span>
          <span>&#9734;</span>
          <span>&#9734;</span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="menu-list">
    <?php
      require "./connect.php";

      // Get the maximum id_menu value from the menu table
      $sql = mysqli_query($conn, "SELECT MAX(id_menu) AS max_menu_id FROM menu");
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
              <div class="menu-item" onclick="addToCart(\'' . $nama_menu . '\', ' . $harga . ')">
                  <img src="./img/menu.png">
                  <h3>' . $nama_menu . '</h3>
                  <p> Rp. ' . $harga . '</p>
              </div>';
          }
        }
        mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>

  
  
  <div class="cart">
    <h3>Keranjang Belanja</h3>
    <div class="cart-items"></div>
    <h4>Total: <span class="cart-total">0</span></h4>
    <button class="btn-checkout" onclick="checkout()">Checkout</button>
  </div>
  
  <div class="thank-you" id="thank-you">
    <h3>Terima Kasih!</h3>
    <p>Pesanan Anda telah diterima.</p>
    <p>Lokasi: Nama UMKM/Restoran</p>
  </div>

    <!-- isi -->

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

  <script>
    
  const cartItems = document.querySelector('.cart-items');
  const cartTotal = document.querySelector('.cart-total');
  const thankYou = document.getElementById('thank-you');

  let total = 0;
  let items = {};

  function addToCart(item, price) {
    if (items[item]) {
      items[item].quantity++;
      items[item].totalPrice = items[item].quantity * price;
    } else {
      items[item] = {
        quantity: 1,
        totalPrice: price
      };
    }
    total += price;

    const cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');
    cartItem.innerHTML = `
      <span>${item} - Rp ${price} (Qty: ${items[item].quantity})</span>
      <button onclick="editCartItem('${item}', ${price})">Edit</button>
      <button onclick="removeCartItem('${item}', ${price})">Hapus</button>
    `;
    cartItems.appendChild(cartItem);

    cartTotal.textContent = total;
  }

  function editCartItem(item, price) {
    const newQuantity = parseInt(prompt(`Masukkan jumlah ${item} yang baru:`));
    if (!isNaN(newQuantity)) {
      const itemTotal = items[item].totalPrice;
      total -= itemTotal;
      items[item].quantity = newQuantity;
      items[item].totalPrice = newQuantity * price;
      total += items[item].totalPrice;

      cartItems.innerHTML = '';
      for (const itemName in items) {
        const { quantity, totalPrice } = items[itemName];
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
          <span>${itemName} - Rp ${price} (Qty: ${quantity})</span>
          <button onclick="editCartItem('${itemName}', ${price})">Edit</button>
          <button onclick="removeCartItem('${itemName}', ${price})">Hapus</button>
        `;
        cartItems.appendChild(cartItem);
      }

      cartTotal.textContent = total;
    }
  }

  function removeCartItem(item, price) {
    const itemTotal = items[item].totalPrice;
    total -= itemTotal;
    delete items[item];

    cartItems.innerHTML = '';
    for (const itemName in items) {
      const { quantity, totalPrice } = items[itemName];
      const cartItem = document.createElement('div');
      cartItem.classList.add('cart-item');
      cartItem.innerHTML = `
        <span>${itemName} - Rp ${price} (Qty: ${quantity})</span>
        <button onclick="editCartItem('${itemName}', ${price})">Edit</button>
        <button onclick="removeCartItem('${itemName}', ${price})">Hapus</button>
      `;
      cartItems.appendChild(cartItem);
    }

    cartTotal.textContent = total;
  }

  function checkout() {
    thankYou.classList.add('show');
    setTimeout(() => {
      thankYou.classList.remove('show');
      cartItems.innerHTML = '';
      cartTotal.textContent = '0';
      total = 0;
      items = {};
    }, 3000);
  }
  </script>
</body>
</html>