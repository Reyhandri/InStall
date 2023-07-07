<?php
include "../connect.php";
session_start();

$idBis = $_GET['id'];

$sqlDel = "DELETE FROM bisnis WHERE id=$idBis";
$sqlRun = mysqli_query($conn, $sqlDel);

if ($sqlRun) {
    header("Location: pengusaha.php");
} else {
    header("Location: pengusaha.php");
}

?>