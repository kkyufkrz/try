<?php 
include_once __DIR__ . '/../config.php'; 
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $BASE_URL ?>dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>By</sup>Azhar</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
    <a class="nav-link" href="<?= $BASE_URL ?>dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $BASE_URL ?>data_perusahaan/index.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Perusahaan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $BASE_URL ?>data_karyawan/index.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Karyawan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Transaksi
    </div>

    <li class="nav-item">   
        <a class="nav-link" href="<?= $BASE_URL ?>data_penggajian/index.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Penggajian</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>