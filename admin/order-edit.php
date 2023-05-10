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
    <title>Edit Order</title>

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

                        <!-- Pesanan -->
                        <li class="nav-header">ORDER</li>
                        <li class="nav-item">
                            <a href="order-add.php" class="nav-link">
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
                            <a href="reject-list.php" class="nav-link">
                                <i class="nav-icon fa fa-ban"></i>
                                <p>
                                    List Reject
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
                            <h1 class="m-0">Edit Order</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Order</li>
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
                                    <h3 class="card-title">Form Edit</h3>
                                </div>

                                <?php
                                include '../connection.php';

                                $id = $_GET['No_Invoice'];
                                $data = mysqli_query($koneksi, "SELECT * FROM Table_Order WHERE No_Invoice = '$id'");
                                while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                    <form action="order-update.php" method="post" value='Simpan'>
                                        <div class="card-body">
                                            <div class="form-group form-group-sm">
                                                <input type="text" name="No_Invoice" class="form-control form-control-sm"
                                                    value="<?php echo $row['No_Invoice'] ?>" placeholder="No. Invoice"
                                                    readonly>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label for="NamaCustomer">Nama Customer</label>
                                                <input type="text" name="Nama_Customer" class="form-control form-control-sm"
                                                    id="NamaCustomer" placeholder="Masukan Nama Customer"
                                                    value="<?php echo $row['Nama_Customer'] ?>" readonly>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="form-group form-group-sm">
                                                        <label for="Status">Status</label>
                                                        <select class="form-control form-control-sm" name='Status'>
                                                            <option value="New Order" <?php if ($row['Status'] == "New Order")
                                                                echo " selected"; ?>>New Order</option>
                                                            <option value="Desain" <?php if ($row['Status'] == "Desain")
                                                                echo " selected"; ?>>Desain</option>
                                                            <option value="Print" <?php if ($row['Status'] == "Print")
                                                                echo " selected"; ?>>Print</option>
                                                            <option value="Press" <?php if ($row['Status'] == "Press")
                                                                echo " selected"; ?>>Press</option>
                                                            <option value="Jahit" <?php if ($row['Status'] == "Jahit")
                                                                echo " selected"; ?>>Jahit</option>
                                                            <option value="Finishing" <?php if ($row['Status'] == "Finishing")
                                                                echo " selected"; ?>>Finishing</option>
                                                            <option value="Reject" <?php if ($row['Status'] == "Reject")
                                                                echo " selected"; ?>>Reject</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" name="Simpan" value="Simpan"
                                                class="btn btn-success">Simpan</button>
                                            <a type="button" href='order-list.php'
                                                class="btn btn-secondary ml-2">Kembali</a>
                                        </div>
                                    </form>
                                    <?php
                                }
                                ?>
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
    <script src="plugins/chart.js/Chart.min.js"></script>
</body>

</html>