<?php ob_start(); ?>
<?php include '../config.php'; ?>
<?php include '../partials/header.php'; ?>

<?php
// Ambil data perusahaan dan karyawan untuk dropdown
$perusahaan_query = mysqli_query($conn, "SELECT * FROM perusahaan");
$karyawan_query = mysqli_query($conn, "SELECT * FROM karyawan");
?>

<div id="wrapper">
    <?php include '../partials/sidebar.php'; ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include '../partials/navbar.php'; ?>

            <div class="container-fluid mt-4">
                <h1 class="h3 mb-4 text-gray-800">Tambah Data Penggajian</h1>

                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">ID Penggajian</label>
                                <input type="text" name="id_penggajian" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Perusahaan</label>
                                <select name="id_perusahaan" class="form-control" required>
                                    <option value="">-- Pilih Perusahaan --</option>
                                    <?php while ($perusahaan = mysqli_fetch_assoc($perusahaan_query)) : ?>
                                        <option value="<?= $perusahaan['id_perusahaan'] ?>"><?= $perusahaan['nama_perusahaan'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Karyawan</label>
                                <select name="id_karyawan" class="form-control" required>
                                    <option value="">-- Pilih Karyawan --</option>
                                    <?php while ($karyawan = mysqli_fetch_assoc($karyawan_query)) : ?>
                                        <option value="<?= $karyawan['id_karyawan'] ?>"><?= $karyawan['nama_karyawan'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gaji Pokok</label>
                                <input type="number" name="gaji_pokok" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bonus</label>
                                <input type="number" name="bonus" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Potongan</label>
                                <input type="number" name="potongan" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Total Gaji</label>
                                <input type="number" id="total_gaji_display" class="form-control" disabled>
                                <input type="hidden" name="total_gaji" id="total_gaji">
                            </div>

                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>

<?php
if (isset($_POST['simpan'])) {
    $id_penggajian = $_POST['id_penggajian'];
    $id_perusahaan = $_POST['id_perusahaan'];
    $id_karyawan = $_POST['id_karyawan'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $bonus = $_POST['bonus'];
    $potongan = $_POST['potongan'];
    $total_gaji = $gaji_pokok + $bonus - $potongan;

    $insert = mysqli_query($conn, "INSERT INTO penggajian (id_penggajian, id_perusahaan, id_karyawan, gaji_pokok, bonus, potongan, total_gaji) VALUES (
       '$id_penggajian', '$id_perusahaan', '$id_karyawan', '$gaji_pokok', '$bonus', '$potongan', '$total_gaji'
    )");

    if ($insert) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>

<!-- Hitung total gaji -->
<script>
    const gajiPokokInput = document.querySelector('input[name="gaji_pokok"]');
    const bonusInput = document.querySelector('input[name="bonus"]');
    const potonganInput = document.querySelector('input[name="potongan"]');
    const totalGajiInput = document.getElementById('total_gaji');
    const totalGajiDisplay = document.getElementById('total_gaji_display');

    function hitungTotalGaji() {
        const gajiPokok = parseInt(gajiPokokInput.value) || 0;
        const bonus = parseInt(bonusInput.value) || 0;
        const potongan = parseInt(potonganInput.value) || 0;
        const total = gajiPokok + bonus - potongan;
        totalGajiInput.value = total;
        totalGajiDisplay.value = total;
    }

    gajiPokokInput.addEventListener('input', hitungTotalGaji);
    bonusInput.addEventListener('input', hitungTotalGaji);
    potonganInput.addEventListener('input', hitungTotalGaji);
</script>

<?php ob_end_flush(); ?>