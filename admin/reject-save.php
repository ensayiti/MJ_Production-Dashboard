<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../connection.php';

$id = $_POST['No_Invoice'];
$Nama_Customer = $_POST['Nama_Customer'];
$Nama_Reject = $_POST['Nama_Reject'];
$Harga = $_POST['Harga'];
$Note = $_POST['Note'];

mysqli_query($koneksi, "INSERT INTO Table_Reject VALUES ('$id', '$Nama_Customer', '$Nama_Reject', '$Harga', '$Note')") or die(mysqli_error($koneksi));

header("location: reject-list.php");
?>