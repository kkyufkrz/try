<?php 
session_start();
include_once 'config.php';
include 'partials/header.php'; 

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$totalPerusahaan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM perusahaan"))['total'];
$totalKaryawan    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM karyawan"))['total'];
$totalPenggajian    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM penggajian"))['total'];
?>

<style>
    a:hover .card {
    transform: scale(1.05);
    transition: 0.2s ease-in-out;
    cursor: pointer;
}
</style>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'partials/sidebar.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                
                <!-- Navbar -->
                <?php include 'partials/navbar.php'; ?>

                <div class="container-fluid ps-4 pe-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 fw-bold">Dashboard</h1>
                        <a href="report.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-print fa-sm text-white-50"></i> Buat laporan
                        </a>

                    </div>

                    <div class="row">

                        <!-- Total Karyawan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?= $BASE_URL ?>data_karyawan/index.php" style="text-decoration: none;">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center ps-3 pe-3">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Karyawan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKaryawan ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Total Perusahaan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?= $BASE_URL ?>data_perusahaan/index.php" style="text-decoration: none;">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center ps-3 pe-3">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Perusahaan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPerusahaan ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Total penggajian -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="<?= $BASE_URL ?>data_penggajian/index.php" style="text-decoration: none;">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center ps-3 pe-3">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Penggajian</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPenggajian ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    </div>
                 </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'partials/footer.php'; ?>