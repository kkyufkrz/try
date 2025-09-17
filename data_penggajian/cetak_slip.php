<?php
include_once '../config.php';
include '../partials/header.php';

$id = $_GET['id_penggajian'] ?? '';

if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

$query = mysqli_query($conn, "
    SELECT g.*, k.nama_karyawan, k.jabatan, p.nama_perusahaan
    FROM penggajian g
    JOIN karyawan k ON g.id_karyawan = k.id_karyawan
    JOIN perusahaan p ON g.id_perusahaan = p.id_perusahaan
    WHERE g.id_penggajian = '$id'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<style>
    body { font-family: Arial, sans-serif; padding: 30px; }
    .slip-container { border: 2px solid #000; padding: 20px; width: 800px; margin: auto; }
    h2 { text-align: center; color: black;}
    table { width: 100%; margin-top: 20px; border-collapse: collapse; }
    td { padding: 8px; }
    .label { width: 40%; font-weight: bold; }
    .value, .label { color: black}
</style>

<body onload="window.print()">

<div class="slip-container">
    <h2>Slip Gaji</h2>
    <hr>
    <table>
        <tr>
            <td class="label">Nama</td>
            <td class="value"><?= htmlspecialchars($data['nama_karyawan']) ?></td>
        </tr>
        <tr>
            <td class="label">Jabatan</td>
            <td class="value"><?= htmlspecialchars($data['jabatan']) ?></td>
        </tr>
        <tr>
            <td class="label">Nama Perusahaan</td>
            <td class="value"><?= htmlspecialchars($data['nama_perusahaan']) ?></td>
        </tr>
        <tr>
            <td class="label">Gaji Pokok</td>
            <td class="value">Rp <?= number_format($data['gaji_pokok'], 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td class="label">Bonus</td>
            <td class="value">Rp <?= number_format($data['bonus'], 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td class="label">Potongan</td>
            <td class="value">Rp <?= number_format($data['potongan'], 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td class="label">Total Gaji Diterima</td>
            <td class="value">Rp <?= number_format($data['total_gaji'], 0, ',', '.') ?></td>
        </tr>
    </table>
    <br><br>
    <div style="text-align:right;">
        <small>Tanggal: <?= date('d-m-Y') ?></small>
    </div>
</div>

</body>
</html>
