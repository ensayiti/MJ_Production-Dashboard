<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../connection.php';

$id = $_POST['No_Invoice'];
$Nama_Customer = $_POST['Nama_Customer'];
$Status = $_POST['Status'];

// Update order data in database
$query = "UPDATE Table_Order SET Nama_Customer='$Nama_Customer', Status='$Status' WHERE No_Invoice='$id'";
mysqli_query($koneksi, $query);

header("location: order-list.php");
?>