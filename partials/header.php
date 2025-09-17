<?php 
include_once __DIR__ . '/../config.php'; 
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Penggajian (Payroll)</title>

    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- SB Admin 2 -->
    <link href="<?= $BASE_URL ?>assets/css/sb-admin-2.min.css" rel="stylesheet">    

    <!-- FontAwesome -->
    <link href="<?= $BASE_URL ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
    .highlight {
        background-color: yellow;
        font-weight: bold;
    }

    .sidebar {
    left: 0;
    transition: all 0.3s ease;
    }

    .sidebar.toggled {
    left: -250px; /* sembunyikan sidebar ke kiri */
    }

    </style>

    </style>
</head>

<body id="page-top">