<?php
include "../connect.php";
session_start();

$if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newMenuName = $_POST["new-menu"];
    $newMenuPrice = $_POST["new-menu-price"];
  
    // Perform the database insertion
    $sql = "INSERT INTO menu (nama, harga) VALUES ('$newMenuName', '$newMenuPrice')";
  
    if ($conn->query($sql) === TRUE) {
      $response = array("success" => true);
    } else {
      $response = array("success" => false, "message" => "Terjadi kesalahan. Silakan coba lagi.");
    }
  
    // Send the response as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
  
    // Close the database connection
    $conn->close();
  }
  ?>