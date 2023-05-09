<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../connection.php';

$id = $_POST['Kode_Barang'];
$Nama_Barang = $_POST['Nama_Barang'];
$Kategori = $_POST['Kategori'];
$Jenis_Satuan = $_POST['Jenis_Satuan'];
$Stock = $_POST['Stock'];

mysqli_query($koneksi, "INSERT INTO Table_Inventory VALUES ('$id', '$Nama_Barang', '$Kategori', '$Jenis_Satuan', '$Stock')") or die(mysqli_error($koneksi));

header("location:inventory-list.php");
?>