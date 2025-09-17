<?php
include_once __DIR__ . '/../config.php';
?>

<!-- Bootstrap Bundle (sudah termasuk Popper.js) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <form class="form-inline">
        <button id="sidebarToggle" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
        <i class="bi bi-list"></i>
    </button>
    </form> 


    <!-- Search -->
    <form method="GET" id="searchForm"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <select name="kategori" id="kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                <option value="<?= $BASE_URL ?>data_perusahaan">Perusahaan</option>
                <option value="<?= $BASE_URL ?>data_karyawan">Karyawan</option>
                <option value="<?= $BASE_URL ?>data_penggajian">Penggajian</option>
            </select>
            <input type="text" name="q" class="form-control bg-light border-0 small" placeholder="Cari data..." required>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Search - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Cari.." aria-label="Search"
                            aria-describedby="basic-addon2" name='search'>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                Halo, <?= htmlspecialchars($_SESSION['username'] ?? 'admin') ?>
                </span>
                <img class="img-profile rounded-circle" src="<?= $BASE_URL ?>assets/img/undraw_profile.svg">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
            </div>
        </li>

</ul>

</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Yakin ingin logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Logout" untuk keluar.</div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="<?= $BASE_URL ?>logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {
    document.body.classList.toggle('sidebar-toggled');
    document.querySelector('.sidebar').classList.toggle('toggled');
});
</script>

<?php include 'footer.php';?>
