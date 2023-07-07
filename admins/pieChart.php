<?php
session_start();
require_once "../connect.php";
$conn = getConnection();
$sql = "SELECT jenis, COUNT(id_jenis) AS jumlah_pengguna
        FROM pesanan
        GROUP BY jenis";
$result = $conn->query($sql);

// Prepare the arrays for labels and data
$data = array();
$labels = array();

// Fetch the data from the result set
if ($result->rowCount() > 0) {
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    array_push($data, $row["jumlah_pengguna"]); 
    array_push($labels, $row["nama"]);
  }
}

// Close the database connection
$conn = null;

// Return the data as JSON
$response = array(
  "data" => $data,
  "labels" => $labels
);
header("Content-type: application/json");
echo json_encode($response);
?>
