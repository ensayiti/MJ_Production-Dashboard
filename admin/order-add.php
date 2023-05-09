<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Tambah Order</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <!-- cek apakah sudah login -->
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }
    ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../dist/img/company_logo.png" alt="Logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../dist/img/company_logo.png" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">MJ Production</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../auth/logout.php" class="nav-link">
                                <i class="nav-icon fa fa-lock"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                        <!-- Pesanan -->
                        <li class="nav-header">ORDER</li>
                        <li class="nav-item">
                            <a href="order-add.php" class="nav-link active">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>
                                    Tambah Order
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="order-list.php" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    List Order
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="order-history.php" class="nav-link">
                                <i class="nav-icon fa fa-check"></i>
                                <p>
                                    Riwayat Order
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="reject-list.php" class="nav-link disabled">
                                <i class="nav-icon fa fa-ban"></i>
                                <p>
                                    List Reject (On Progress)
                                </p>
                            </a>
                        </li>

                        <!-- Inventory -->
                        <li class="nav-header">INVENTORY</li>
                        <li class="nav-item">
                            <a href="inventory-add.php" class="nav-link">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>
                                    Tambah Barang
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="inventory-list.php" class="nav-link">
                                <i class="nav-icon fa fa-inbox"></i>
                                <p>
                                    List Inventory
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tambah Order</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Order</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Order</h3>
                                </div>

                                <!-- == Rentan edit: ALTER TABLE tb_customer AUTO_INCREMENT=1; == -->
                                <!-- Invoice -->
                                <?php
                                // Mendapatkan tanggal hari ini dalam format ddmmyyyy
                                $tanggal = date('dmY');

                                // Membuat koneksi ke database dan mendapatkan nomor invoice terakhir
                                include '../connection.php';
                                $query = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(No_Invoice, 11)) AS max_invoice FROM Table_Order WHERE SUBSTRING(No_Invoice, 3, 8) = '$tanggal'");
                                $data = mysqli_fetch_assoc($query);
                                $next_invoice = intval($data['max_invoice']) + 1;

                                // Membuat nomor invoice baru dengan format MJddmmyyyy0001
                                $invoice_number = "MJ" . $tanggal . str_pad($next_invoice, 4, "0", STR_PAD_LEFT);
                                ?>
                                <form action="order-save.php" method="post" value='Simpan'
                                    enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-group-sm">
                                            <input type="text" name="No_Invoice" class="form-control form-control-sm"
                                                value="<?php echo $invoice_number; ?>" placeholder="No. Invoice">
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="NamaCustomer">Nama Customer</label>
                                            <input type="text" name="Nama_Customer" class="form-control form-control-sm"
                                                id="NamaCustomer" placeholder="Masukan Nama Customer">
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="NamaCustomer">Nama Pesanan</label>
                                            <input type="text" name="Nama_Pesanan" class="form-control form-control-sm"
                                                id="NamaCustomer" placeholder="Masukan Nama Pesanan">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="TanggalPesan">Tanggal Pesan</label>
                                                    <input type="date" name="Tanggal_Pesanan"
                                                        class="form-control form-control-sm" id="TanggalPesan"
                                                        placeholder="Masukan Tanggal">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="TanggalJadi">Tanggal Estimasi Jadi</label>
                                                    <input type="date" name="Tanggal_Jadi"
                                                        class="form-control form-control-sm" id="TanggalJadi"
                                                        placeholder="Masukan Tanggal">
                                                </div>
                                            </div>
                                        </div>

                                        <!--------------------------------------- ITEM --------------------------------------->
                                        <h3 class='font-weight-bold'>Item</h3>
                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
                                            Masukan Nama Item, Qty, dan Harga Satuan dengan teliti. Sistem ini masih
                                            dalam tahap pengembangan.
                                        </div>
                                        <div class="row after-add-more">
                                            <div class="col">
                                                <div class="form-group form-group-sm">
                                                    <label for="NamaItem" class='text-xs'>Nama Item</label>
                                                    <input type="text" name="Nama_Item[]"
                                                        class="form-control form-control-sm" id="NamaItem"
                                                        placeholder="Masukan Item">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group form-group-sm">
                                                    <label for="Qty" class='text-xs'>Qty</label>
                                                    <input type="text" name="Qty[]" class="form-control form-control-sm"
                                                        id="Qty" placeholder="Masukan Qty">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group form-group-sm">
                                                    <label for="HargaSatuan" class='text-xs'>Harga Satuan</label>
                                                    <input type="text" name="Harga_Satuan[]"
                                                        class="form-control form-control-sm" id="HargaSatuan"
                                                        placeholder="Masukan Harga Satuan Item"
                                                        onkeyup="formatRupiah(this)">
                                                </div>
                                            </div>

                                            <div class='col'>
                                                <label for="TotalHargaItem" class='text-xs'>Total Harga/item</label>
                                                <div class="input-group">

                                                    <input type="text" name="Total_Harga_Item[]"
                                                        class="form-control form-control-sm" id="TotalHargaItem"
                                                        placeholder="Total Harga" onkeyup="formatRupiah(this)" readonly>

                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-sm btn-danger add-more"><i
                                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tombol Add -->
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                function addRemoveBtn() {
                                                    $(".remove-more").remove();
                                                    $(".after-add-more:not(:first)").each(function () {
                                                        // tambahkan tombol hapus pada form baru
                                                        $(this).find(".input-group-prepend").prepend('<button type="button" class="btn btn-sm btn-danger remove-more"><i class="fa fa-trash" aria-hidden="true"></i></button>');
                                                        // hapus tombol tambah pada form baru
                                                        $(this).find(".add-more").remove();
                                                        formatRupiah(this);
                                                    });
                                                }

                                                $(".add-more").click(function () {
                                                    var html = $(".after-add-more").last().clone().find("input").val("").end();
                                                    $(".after-add-more").last().after(html);
                                                    addRemoveBtn();
                                                });

                                                $(document).on('click', '.remove-more', function () {
                                                    $(this).closest('.after-add-more').remove();
                                                    addRemoveBtn();
                                                });

                                                addRemoveBtn();
                                            });
                                        </script>
                                        <!-- Tombol Add -->

                                        <!-- Fungsi Penambahan Qty + HargaSatuan = TotalHargaItem + Semua = TotalHarga -->
                                        <script>
                                            $(document).ready(function () {
                                                function calculateTotalHargaItem() {
                                                    $(".after-add-more").each(function (index) {
                                                        var Qty = $(this).find("[id^=Qty]").val();
                                                        var HargaSatuan = $(this).find("[id^=HargaSatuan]").val();

                                                        HargaSatuan = HargaSatuan.replace(/\./g, '');
                                                        Qty = parseInt(Qty);
                                                        HargaSatuan = parseInt(HargaSatuan);
                                                        var TotalHargaItem = Qty * HargaSatuan;
                                                        TotalHargaItem = TotalHargaItem.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                                        $(this).find("[id^=TotalHargaItem]").val(TotalHargaItem);
                                                    });
                                                    calculateTotalHarga();
                                                    calculateDPdanSisaPembayaran();
                                                }

                                                function calculateTotalHarga() {
                                                    var total = 0;
                                                    $(".after-add-more").each(function () {
                                                        var TotalHargaItem = $(this).find("[id^=TotalHargaItem]").val();
                                                        TotalHargaItem = TotalHargaItem.replace(/\./g, '');
                                                        total += parseInt(TotalHargaItem);
                                                    });
                                                    total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                                    $("#TotalHarga").val(total);
                                                    calculateDPdanSisaPembayaran();
                                                }

                                                function calculateDPdanSisaPembayaran() {
                                                    var TotalHarga = $("#TotalHarga").val().replace(/\./g, '');
                                                    var DP = $("#DP").val().replace(/\./g, '');
                                                    TotalHarga = parseInt(TotalHarga);
                                                    DP = parseInt(DP);
                                                    var SisaPembayaran = TotalHarga - DP;
                                                    SisaPembayaran = SisaPembayaran.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                                    $("#Sisa").val(SisaPembayaran);
                                                }

                                                $(document).on('keyup', '[id^=Qty], [id^=HargaSatuan]', function () {
                                                    calculateTotalHargaItem();
                                                });

                                                $(document).on('click', '.add-more, .remove-more', function () {
                                                    calculateTotalHargaItem();
                                                });

                                                $(document).on('keyup', '#TotalHarga, #DP', function () {
                                                    calculateDPdanSisaPembayaran();
                                                });
                                            });
                                        </script>

                                        <!--------------------------------------- ITEM --------------------------------------->

                                        <div class="form-group form-group-sm">
                                            <label for="TotalHarga">Total Harga</label>
                                            <input type="text" name="Total_Harga" class="form-control form-control-sm"
                                                id="TotalHarga" placeholder="Total Harga Semua"
                                                onkeyup="formatRupiah(this)" readonly>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="DP">DP Awal</label>
                                            <input type="text" name="DP_masuk" class="form-control form-control-sm"
                                                id="DP" placeholder="DP Awal" onkeyup="formatRupiah(this)">
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="Sisa">Sisa Pembayaran</label>
                                            <input type="text" name="Sisa_Pembayaran"
                                                class="form-control form-control-sm" id="Sisa"
                                                placeholder='Sisa Pembayaran' onkeyup="formatRupiah(this)" readonly>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label>Note</label>
                                                <div class="custom-file">
                                                    <input type="file" name="Note" class="custom-file-input"
                                                        id="customFile">
                                                    <label class="custom-file-label" for="customFile">Pilih
                                                        File</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label>Mock Up</label>
                                                <div class="custom-file">
                                                    <input type="file" name="Gambar" class="custom-file-input"
                                                        id="customFile">
                                                    <label class="custom-file-label" for="customFile">Pilih
                                                        Gambar</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Fungsi memunculkan nama file yang diupload -->
                                        <script>
                                            // Fungsi untuk menampilkan nama file pada label custom-file-label
                                            $('.custom-file-input').on('change', function () {
                                                var fileName = $(this).val().split('\\').pop();
                                                $(this).siblings('.custom-file-label').html(fileName);
                                            });
                                        </script>
                                        <!-- Fungsi memunculkan nama file yang diupload -->

                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group form-group-sm">
                                                    <label for="Status">Status</label>
                                                    <select class="form-control form-control-sm" name='Status'>
                                                        <option value="New Order">New Order</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group form-group-sm">
                                                    <label for="NamaCustomer">Reject</label>
                                                    <select class="form-control form-control-sm" name='Reject'>
                                                        <option value="Tidak Ada Reject">Tidak Ada Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Format Uang -->
                                        <script>
                                            /* Tanpa Rupiah */
                                            var hargaSatuan = document.getElementById('HargaSatuan');
                                            hargaSatuan.addEventListener('keyup', function (e) {
                                                hargaSatuan.value = formatRupiah(this.value);
                                            });

                                            var totalHargaItem = document.getElementById('TotalHargaItem');
                                            totalHargaItem.addEventListener('keyup', function (e) {
                                                totalHargaItem.value = formatRupiah(this.value);
                                            });

                                            var totalHarga = document.getElementById('TotalHarga');
                                            totalHarga.addEventListener('keyup', function (e) {
                                                totalHarga.value = formatRupiah(this.value);
                                            });

                                            var dp = document.getElementById('DP');
                                            dp.addEventListener('keyup', function (e) {
                                                dp.value = formatRupiah(this.value);
                                            });

                                            var sisa = document.getElementById('Sisa');
                                            sisa.addEventListener('keyup', function (e) {
                                                sisa.value = formatRupiah(this.value);
                                            });

                                            /* Fungsi */
                                            function formatRupiah(input) {
                                                var number_string = input.value.replace(/[^,\d]/g, '').toString(),

                                                    split = number_string.split(','),
                                                    sisa = split[0].length % 3,
                                                    rupiah = split[0].substr(0, sisa),
                                                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                                                if (ribuan) {
                                                    separator = sisa ? '.' : '';
                                                    rupiah += separator + ribuan.join('.');
                                                }

                                                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                                                input.value = rupiah;
                                            }
                                        </script>
                                        <!-- Format Uang -->
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" name="Simpan" value="Simpan"
                                            class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main row -->
                <div class="row">
                    <div class="col-md-8">

                        <!-- TABLE -->

                    </div>


                </div>
            </section>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://instagram.com/ensayiti">XEM</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Anything you want.</b>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>

    <!-- jQuery Mapael -->
    <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
</body>

</html>