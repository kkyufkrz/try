<?php
include_once 'config.php';
include 'partials/header.php';

$totalPerusahaan    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM perusahaan"))['total'];
$totalKaryawan      = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM karyawan"))['total'];
$totalPenggajian    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM penggajian"))['total'];
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 40px;
        background: #f9f9f9;
    }

    .header {
        text-align: center;
        margin-bottom: 30px;
        margin-top: 20px;
    }

    .header img {
        height: 80px;
        margin-bottom: 10px;
    }

    .line {
        border-top: 2px solid #000;
        margin: 20px 0;
    }

    h2 {
        margin-top: 0;
        font-size: 32px;
        color: black;
        font-weight: bold;
    }

    .description {
        text-align: center;
        margin-bottom: 30px;
        font-style: italic;
        color: #555;
    }

    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);

    }

    th, td {
        border: 1px solid #ccc;
        padding: 12px 20px;
        text-align: center;
        color: black;
    }

    th {
        background-color:rgb(0, 70, 146);
        color: white;
    }

    .footer {
        margin-top: 40px;
        text-align: center;
        font-size: 14px;
        color: #555;
    }

    .print-btn {
        text-align: center;
        margin-top: 20px;
    }

    @media print {
        .print-btn { display: none; }
        body { background: white; }
    }
</style>

<div class="header">
    <h2>Laporan Ringkasan Dashboard</h2>
    <div class="description">Laporan ini memuat data rekapitulasi entitas penting dalam sistem penggajian.</div>
</div>

<table>
    <thead>
        <tr>
            <th>Data</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>Total Perusahaan</td><td><?= $totalPerusahaan ?></td></tr>
        <tr><td>Total Karyawan</td><td><?= $totalKaryawan ?></td></tr>
        <tr><td>Total Penggajian</td><td><?= $totalPenggajian ?></td></tr>
    </tbody>
</table>

<div class="print-btn">
    <button class="btn btn-success" onclick="window.print()">Cetak</button>
</div>

<?php include 'partials/footer.php'; ?>