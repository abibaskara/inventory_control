<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Sistem Informasi Inventory Control">

    <title>Inventory | Sistem Informasi Inventory Control</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/dropzone/dropzone.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/dropify/dist/dropify.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo1/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" />
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand" style="font-size: 20px;">
                    Inventory<span>Control</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <?php if ($_SESSION['role'] == 'Inventory') { ?>
                        <li class="nav-item nav-category">Main</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Data Master</li>
                        <li class="nav-item">
                            <a href=" <?= base_url() ?>Inventory/Departement" class="nav-link">
                                <i class="link-icon" data-feather="briefcase"></i>
                                <span class="link-title">Departement</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Supplier" class="nav-link">
                                <i class="link-icon" data-feather="users"></i>
                                <span class="link-title">users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Kategori" class="nav-link">
                                <i class="link-icon" data-feather="grid"></i>
                                <span class="link-title">Kategori Barang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Barang" class="nav-link">
                                <i class="link-icon" data-feather="archive"></i>
                                <span class="link-title">Barang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/User" class="nav-link">
                                <i class="link-icon" data-feather="user"></i>
                                <span class="link-title">User</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Main Menu</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Data_Barang_Masuk" class="nav-link">
                                <i class="link-icon" data-feather="log-in"></i>
                                <span class="link-title">Data Barang Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#permintaan" role="button" aria-expanded="false" aria-controls="permintaan">
                                <i class="link-icon" data-feather="shopping-bag"></i>
                                <span class="link-title">Permintaan Barang</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="permintaan">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>Inventory/Request_Permintaan_Barang" class="nav-link">Request Permintaan Barang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>Inventory/Data_Permintaan_Barang" class="nav-link">Data Permintaan Barang</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Data_Barang_Keluar" class="nav-link">
                                <i class="link-icon" data-feather="truck"></i>
                                <span class="link-title">Data Barang Keluar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/PO" class="nav-link">
                                <i class="link-icon" data-feather="file-text"></i>
                                <span class="link-title">PO</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Data_Stok_Barang" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart-2"></i>
                                <span class="link-title">Data Stok Barang</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Laporan</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Laporan_Barang_Masuk" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan Barang Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Laporan_Barang_Keluar" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan Barang Keluar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Laporan_Permintaan_Barang" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan Permintaan Barang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Laporan_PO" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan PO</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Inventory/Laporan_Stok_Barang" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan Stok Barang</span>
                            </a>
                        </li>
                    <?php } elseif ($_SESSION['role'] == 'Produksi') { ?>
                        <li class="nav-item nav-category">Main</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Produksi" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Main Menu</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Produksi/Permintaan_Barang" class="nav-link">
                                <i class="link-icon" data-feather="inbox"></i>
                                <span class="link-title">Permintaan Barang</span>
                            </a>
                        </li>
                    <?php } elseif ($_SESSION['role'] == 'Manager') { ?>
                        <li class="nav-item nav-category">Main</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Manager" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Laporan</li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Manager/Laporan_Barang_Masuk" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan Barang Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Manager/Laporan_Barang_Keluar" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan Barang Keluar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Manager/Laporan_Permintaan_Barang" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan Permintaan Barang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Manager/Laporan_PO" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan PO</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Manager/Laporan_Stok_Barang" class="nav-link">
                                <i class="link-icon" data-feather="bar-chart"></i>
                                <span class="link-title">Laporan Stok Barang</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <ul class="navbar-nav">
                        <?php if ($_SESSION['role']  == 'Inventory') { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="bell"></i>
                                    <div id="icon-notif"></div>
                                </a>
                                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                                        <div id="jml_notifikasi"></div>

                                        <!-- <a href="javascript:;" class="text-muted">Clear all</a> -->
                                    </div>
                                    <div class="p-1">
                                        <div id="dropdown_notifikasi"></div>
                                    </div>
                                    <div id="view_all_notifikasi"></div>
                                </div>
                            </li>
                        <?php } ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle" src="<?= base_url() ?>assets/profile/<?= $_SESSION['foto'] ?>" alt="profile">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle" src="<?= base_url() ?>assets/profile/<?= $_SESSION['foto'] ?>" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder"><?= $_SESSION['nama_user'] ?></p>
                                        <p class="tx-12 text-muted"><?= $_SESSION['email'] ?></p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <?php if ($_SESSION['role'] == 'Inventory') { ?>
                                        <li class="dropdown-item py-2">
                                            <a href="<?= base_url() ?>Inventory/Profile" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                    <?php } elseif ($_SESSION['role'] == 'Produksi') { ?>
                                        <li class="dropdown-item py-2">
                                            <a href="<?= base_url() ?>Produksi/Profile" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                    <?php } elseif ($_SESSION['role'] == 'Manager') { ?>
                                        <li class="dropdown-item py-2">
                                            <a href="<?= base_url() ?>Manager/Profile" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <li class="dropdown-item py-2">
                                        <a href="<?= base_url() ?>Auth/Logout" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->

            <div class="page-content">

                <?= $contents ?>

            </div>

            <!-- partial:partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2022 a PT. Mayora Indah. TBK.</p>
            </footer>
            <!-- partial -->

        </div>
    </div>
    <script src="<?= base_url() ?>assets/public/js/main.js"></script>
</body>

</html>