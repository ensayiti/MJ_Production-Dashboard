<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MJ Production</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Toastr -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Login Check / Notif Toastr -->
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo '<script>toastr.error("Login gagal! username dan password salah!","System Alert")</script>';
            } else if ($_GET['pesan'] == "logout") {
                echo '<script>toastr.success("Anda telah berhasil logout","Thank you!")</script>';
            } else if ($_GET['pesan'] == "belum_login") {
                echo '<script>toastr.warning("Anda harus login untuk mengakses halaman admin","System Warning")</script>';
            }
        }
        ?>

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/company_logo.png" alt="Logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
                <img src="dist/img/company_logo.png" alt="Logo" class="brand-image img-circle elevation-3"
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
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <!-- Admin -->
                        <li class="nav-header">ADMIN</li>
                        <li class="nav-item">
                            <a href="auth/login.php" class="nav-link">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>
                                    Login
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
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">List Order</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0 table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Invoice</th>
                                                    <th>Nama</th>
                                                    <th>Pesanan</th>
                                                    <th>Tgl Pesan</th>
                                                    <th>Tgl Estimasi</th>
                                                    <th>Total Harga</th>
                                                    <th>DP</th>
                                                    <th>Sisa</th>
                                                    <th>Note</th>
                                                    <th>Gambar</th>
                                                    <th>Status</th>
                                                    <th>Reject</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'connection.php';

                                                $id = $_GET['No_Invoice'];
                                                $data = mysqli_query($koneksi, "SELECT * FROM Table_Order");
                                                while ($row = mysqli_fetch_array($data)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <a type='button' data-toggle="modal"
                                                                data-target="#modal-<?php echo $row['No_Invoice'] ?>">
                                                                <?php echo $row['No_Invoice'] ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Nama_Customer'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Nama_Pesanan'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Tanggal_Pesanan'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Tanggal_Jadi'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Total_Harga'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['DP_masuk'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Sisa_Pembayaran'] ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary" href="<?php echo $row['Note'] ?>" download>Unduh</a>
                                                        </td>
                                                        <td>
                                                            <img class='img-fluid' src="<?php echo $row['Gambar'] ?>">
                                                        </td>
                                                        <td>
                                                            <?php if ($row['Status'] == 'New Order') { ?>
                                                                <span class='badge badge-pill badge-info'>
                                                                    <?php echo $row['Status']; ?>
                                                                </span>
                                                            <?php } elseif ($row['Status'] == 'Desain') { ?>
                                                                <span class='badge badge-pill badge-secondary'>
                                                                    <?php echo $row['Status']; ?>
                                                                </span>
                                                            <?php } elseif ($row['Status'] == 'Print') { ?>
                                                                <span class='badge badge-pill badge-dark'>
                                                                    <?php echo $row['Status']; ?>
                                                                </span>
                                                            <?php } elseif ($row['Status'] == 'Press') { ?>
                                                                <span class='badge badge-pill badge-light'>
                                                                    <?php echo $row['Status']; ?>
                                                                </span>
                                                            <?php } elseif ($row['Status'] == 'Jahit') { ?>
                                                                <span class='badge badge-pill badge-primary'>
                                                                    <?php echo $row['Status']; ?>
                                                                </span>
                                                            <?php } elseif ($row['Status'] == 'Finishing') { ?>
                                                                <span class='badge badge-pill badge-success'>
                                                                    <?php echo $row['Status']; ?>
                                                                </span>
                                                            <?php } elseif ($row['Status'] == 'Reject') { ?>
                                                                <span class='badge badge-pill badge-danger'>
                                                                    <?php echo $row['Status']; ?>
                                                                </span>
                                                            <?php } else { ?>
                                                                <span class='badge badge-success'>
                                                                    <?php echo $row['Status']; ?>
                                                                </span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row['Reject'] == 'Tidak Ada Reject') { ?>
                                                                <span class='badge badge-pill badge-success'>
                                                                    <?php echo $row['Reject']; ?>
                                                                </span>
                                                            <?php } else { ?>
                                                                <span class='badge badge-pill badge-danger'>
                                                                    <?php echo $row['Reject']; ?>
                                                                </span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        <!-- Modal Detil -->
                                        <?php
                                        include 'connection.php';
                                        $id = $_GET['No_Invoice'];
                                        $data = mysqli_query($koneksi, "SELECT * FROM Table_Pesanan_Item GROUP BY No_Invoice");
                                        while ($row = mysqli_fetch_array($data)) {
                                            ?>
                                            <div class="modal fade" id="modal-<?php echo $row['No_Invoice'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                                Detil Pesanan
                                                                -
                                                                <?php echo $row['No_Invoice'] ?>
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class='table m-0 table-hover text-nowrap'>
                                                                    <thead>
                                                                        <tr class='text-center'>
                                                                            <th>Nama Item</th>
                                                                            <th>Qty</th>
                                                                            <th>Harga Satuan</th>
                                                                            <th>Total Harga/item</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        // Retrieve all data for the current No_Invoice group
                                                                        $group_data = mysqli_query($koneksi, "SELECT * FROM Table_Pesanan_Item WHERE No_Invoice = '{$row['No_Invoice']}'");
                                                                        while ($group_row = mysqli_fetch_array($group_data)) {
                                                                            ?>
                                                                            <tr class='text-center'>
                                                                                <td>
                                                                                    <?php echo $group_row['Nama_Item'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $group_row['Qty'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $group_row['Harga_Satuan'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $group_row['Total_Harga_Item'] ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <!-- Modal Detil -->
                                    </div>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer clearfix">
                                    <a href="javascript:void(0)"
                                        class="btn btn-sm btn-secondary float-right">Pagination</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main row -->
                    <div class="row">
                        <div class="col-md-8">

                            <!-- TABLE -->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">List Inventory</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0 table-hover text-nowrap">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kategori</th>
                                                    <th>Jenis Satuan</th>
                                                    <th>Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>BRG001</td>
                                                    <td>Cotton</td>
                                                    <td>Bahan</td>
                                                    <td>Meter</td>
                                                    <td>10meter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer clearfix">
                                    <a href="javascript:void(0)"
                                        class="btn btn-sm btn-secondary float-right">Pagination</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Info Boxes Style 2 -->

                            <?php
                            include 'connection.php';

                            // Menghitung Jumlah Order
                            $count_query = "SELECT COUNT(*) AS total_orders FROM Table_Order";
                            $count_result = mysqli_query($koneksi, $count_query);

                            $row = mysqli_fetch_assoc($count_result);
                            $total_orders = $row['total_orders'];

                            // Menghitung DP Masuk
                            $total_dp_query = "SELECT SUM(CAST(REPLACE(DP_masuk, '.', '') AS DECIMAL)) AS total_dp FROM Table_Order";
                            $result = mysqli_query($koneksi, $total_dp_query);
                            $row = mysqli_fetch_assoc($result);
                            $total_dp = $row['total_dp'];

                            // Menghitung Riwayat Order
                            $riwayat_query = "SELECT COUNT(*) as total_riwayat FROM Table_RiwayatOrder";
                            $riwayat_result = mysqli_query($koneksi, $riwayat_query);

                            $row = mysqli_fetch_assoc($riwayat_result);
                            $total_riwayat = $row['total_riwayat'];

                            ?>
                            <div class="info-box mb-3 bg-warning">
                                <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Order</span>
                                    <span class="info-box-number">
                                        <?php echo $total_orders; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">DP Masuk</span>
                                    <span class="info-box-number">
                                        <?php echo number_format($total_dp, 0, ',', '.'); ?>
                                    </span>
                                </div>
                            </div>

                            <div class="info-box mb-3 bg-danger">
                                <span class="info-box-icon"><i class="fas fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Riwayat Order</span>
                                    <span class="info-box-number">
                                        <?php echo $total_riwayat; ?>
                                    </span>
                                </div>
                            </div>

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
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
</body>

</html>