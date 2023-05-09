<?php
include '../connection.php';

$id = $_GET['No_Invoice'];

$query = "DELETE FROM Table_Order WHERE No_Invoice = '$id'";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: order-list.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>