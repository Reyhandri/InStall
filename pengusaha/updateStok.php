<?php
  require "../connect.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_menu = $_POST["nama"];
    $stok = $_POST["stok"];

    // Update the stock in the "menu" table
    $sql = "UPDATE menu SET stok = stok +'$stok' WHERE nama_menu = '$nama_menu'";

    if (mysqli_query($conn, $sql)) {
      // Redirect to a success page
      header("Location: kelola.php");
      exit;
    } else {
      echo "Error updating stock: " . mysqli_error($conn);
    }

    mysqli_close($conn);
  }
?>
