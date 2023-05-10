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
    <title>Admin | List Reject</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
                            <a href="reject-list.php" class="nav-link active">
                                <i class="nav-icon fa fa-ban"></i>
                                <p>
                                    List Reject
                                </p>
                            </a>
                        </li>

                        <!-- Inventory -->
                        <li class="nav-header">INVENTORY</li>
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
                            <h1 class="m-0">List Reject</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">List Reject</li>
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
                                    <h3 class="card-title">List Reject</h3>
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
                                                <tr class='text-center'>
                                                    <!--<th>#</th>-->
                                                    <th>Invoice</th>
                                                    <th>Nama Customer</th>
                                                    <th>Nama Reject</th>
                                                    <th>Harga</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include '../connection.php';

                                                $id = $_GET['No_Invoice'];
                                                $data = mysqli_query($koneksi, "SELECT * FROM Table_Reject");
                                                while ($row = mysqli_fetch_array($data)) {
                                                    ?>
                                                    <tr class="text-center">

                                                        <td>
                                                            <?php echo $row['No_Invoice'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Nama_Reject'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Nama_Customer'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Harga'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Note'] ?>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer clearfix">
                                    <!--<a href="inventory-add.php" class="btn btn-sm btn-info float-left">Tambah Barang</a>-->
                                    <!--<a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Pagination</a>-->
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
    <script src="../plugins/chart.js/Chart.min.js"></script>
</body>

</html>