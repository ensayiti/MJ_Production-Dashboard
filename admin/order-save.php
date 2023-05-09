<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../connection.php';

$no_invoice = $_POST['No_Invoice'];
$nama_customer = $_POST['Nama_Customer'];
$nama_pesanan = $_POST['Nama_Pesanan'];
$tanggal_pesanan = $_POST['Tanggal_Pesanan'];
$tanggal_jadi = $_POST['Tanggal_Jadi'];
$total_harga = $_POST['Total_Harga'];
$dp_masuk = $_POST['DP_masuk'];
$sisa_pembayaran = $_POST['Sisa_Pembayaran'];
$status = $_POST['Status'];
$reject = $_POST['Reject'];
$nama_item = $_POST['Nama_Item'];
$qty = $_POST['Qty'];
$harga_satuan = $_POST['Harga_Satuan'];
$total_harga_item = $_POST['Total_Harga_Item'];

if (isset($_FILES['Note'])) {
    $note_tmp_name = $_FILES['Note']['tmp_name'];
    $note_name = $no_invoice . "." . pathinfo($_FILES['Note']['name'], PATHINFO_EXTENSION);
    $note_location = "https://mj-product.com/MJProductDesktop%20Koneksi/Data/Document/" . $note_name;
    move_uploaded_file($note_tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/MJProductDesktop Koneksi/Data/Document/" . $note_name);
}


if (isset($_FILES['Gambar'])) {
    $gambar_tmp_name = $_FILES['Gambar']['tmp_name'];
    $gambar_name = $no_invoice . "." . pathinfo($_FILES['Gambar']['name'], PATHINFO_EXTENSION);
    $gambar_location = "https://mj-product.com/MJProductDesktop%20Koneksi/Data/Mock%20Up/" . $gambar_name;
    move_uploaded_file($gambar_tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/MJProductDesktop Koneksi/Data/Mock Up/" . $gambar_name);
}

$sql1 = "INSERT INTO Table_Order (No_Invoice, Nama_Customer, Nama_Pesanan, Tanggal_Pesanan, Tanggal_Jadi, Total_Harga, DP_masuk, Sisa_Pembayaran, Gambar, Note, Status, Reject) VALUES ('$no_invoice', '$nama_customer', '$nama_pesanan', '$tanggal_pesanan', '$tanggal_jadi', '$total_harga', '$dp_masuk', '$sisa_pembayaran', '$gambar_location', '$note_location', '$status', '$reject')";

if ($koneksi->query($sql1) === true) {

    $sql2 = "INSERT INTO Table_Pesanan_Item (No_Invoice, Nama_Item, Qty, Harga_Satuan, Total_Harga_Item) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql2);

    foreach ($_POST['Nama_Item'] as $key => $value) {
        $nama_item = $_POST['Nama_Item'][$key];
        $qty = $_POST['Qty'][$key];
        $harga_satuan = $_POST['Harga_Satuan'][$key];
        $total_harga_item = $_POST['Total_Harga_Item'][$key];
        $stmt->bind_param("sssss", $no_invoice, $nama_item, $qty, $harga_satuan, $total_harga_item);
        $stmt->execute();
    }

    header("location:order-list.php");
} else {

    echo "Terjadi kesalahan saat menyimpan data: " . mysqli_connect_error();
}

$stmt->close();
$koneksi->close();

?>