<?php
include '../config.php';
include '../partials/header.php';

$id_penggajian = $_GET['id_penggajian'] ?? null;

// Proses update
if (isset($_POST['update'])) {
    $id_perusahaan = $_POST['id_perusahaan'];
    $id_karyawan = $_POST['id_karyawan'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $bonus = $_POST['bonus'];
    $potongan = $_POST['potongan'];
    $total_gaji = $_POST['total_gaji'];

    $update = mysqli_query($conn, "UPDATE penggajian SET 
        id_perusahaan = '$id_perusahaan',
        id_karyawan = '$id_karyawan',
        gaji_pokok = '$gaji_pokok',
        bonus = '$bonus',
        potongan = '$potongan',
        total_gaji = '$total_gaji'
        WHERE id_penggajian = '$id_penggajian'
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }
}

// Ambil data
$query = mysqli_query($conn, "SELECT * FROM penggajian WHERE id_penggajian = '$id_penggajian'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan");
}
// Ambil data perusahaan dan karyawan
$perusahaan_query = mysqli_query($conn, "SELECT * FROM perusahaan");
$karyawan_query = mysqli_query($conn, "SELECT * FROM karyawan");
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Data Penggajian</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="id_penggajian" value="<?= $data['id_penggajian'] ?>">

                <div class="mb-3">
                    <label class="form-label">ID Penggajian</label>
                    <input type="text" class="form-control" value="<?= $data['id_penggajian'] ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Perusahaan</label>
                    <select name="id_perusahaan" class="form-control" required>
                        <option value="">-- Pilih Perusahaan --</option>
                        <?php while ($perusahaan = mysqli_fetch_assoc($perusahaan_query)) : ?>
                             <option value="<?= $perusahaan['id_perusahaan'] ?>" <?= ($perusahaan['id_perusahaan'] == $data['id_perusahaan']) ? 'selected' : '' ?>>
                                <?= $perusahaan['nama_perusahaan'] ?>
                        <?php endwhile; ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <select name="id_karyawan" class="form-control" required>
                        <option value="">-- Pilih Karyawan --</option>
                        <?php while ($karyawan = mysqli_fetch_assoc($karyawan_query)) : ?>
                             <option value="<?= $karyawan['id_karyawan'] ?>" <?= ($karyawan['id_karyawan'] == $data['id_karyawan']) ? 'selected' : '' ?>>
                                <?= $karyawan['nama_karyawan'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" value="<?= $data['gaji_pokok']  ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bonus</label>
                    <input type="number" name="bonus" class="form-control" value="<?= $data['bonus'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Potongan</label>
                    <input type="text" name="potongan" class="form-control" value="<?= $data['potongan'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Gaji</label>
                    <input type="number" id="total_gaji_display" class="form-control" disabled>
                    <input type="hidden" name="total_gaji" id="total_gaji">
                </div>

                <button type="submit" name="update" class="btn btn-success">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

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

<?php include '../partials/footer.php'; ?>