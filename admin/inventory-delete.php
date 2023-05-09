<?php
include '../connection.php';

$id = $_GET['Kode_Barang'];

$query = "DELETE FROM Table_Inventory WHERE Kode_Barang = '$id'";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: inventory-list.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>