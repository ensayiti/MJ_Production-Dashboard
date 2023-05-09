<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}
include '../connection.php';

if (isset($_GET['No_Invoice'])) {
    $no_invoice = $_GET['No_Invoice'];

    // Ambil data dari Table_Order berdasarkan No_Invoice
    $query_order = "SELECT * FROM Table_Order WHERE No_Invoice='$no_invoice'";
    $result_order = mysqli_query($koneksi, $query_order);

    if (mysqli_num_rows($result_order) > 0) {
        // Pindahkan data ke Table_RiwayatOrder
        $data_order = mysqli_fetch_assoc($result_order);
        $nama_customer = $data_order['Nama_Customer'];
        $nama_pesanan = $data_order['Nama_Pesanan'];
        $tanggal_pesanan = $data_order['Tanggal_Pesanan'];
        $tanggal_jadi = $data_order['Tanggal_Jadi'];
        $total_harga = $data_order['Total_Harga'];
        $note = $data_order['Note'];
        $gambar = $data_order['Gambar'];
        $reject = $data_order['Reject'];
        $query_riwayat = "INSERT INTO Table_RiwayatOrder (No_Invoice, Nama_Customer, Nama_Pesanan, Tanggal_Pesanan, Tanggal_Jadi, Total_Harga, Note, Gambar, Reject) VALUES ('$no_invoice', '$nama_customer', '$nama_pesanan'. '$tanggal_pesanan', '$tanggal_jadi', '$total_harga', '$note', '$gambar', '$reject')";
        mysqli_query($koneksi, $query_riwayat);

        // Hapus data dari Table_Order
        $query_delete = "DELETE FROM Table_Order WHERE No_Invoice='$no_invoice'";
        mysqli_query($koneksi, $query_delete);

        // Redirect ke halaman sebelumnya
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>