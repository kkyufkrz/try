<?php
include '../config.php';
include '../partials/header.php';

$id_karyawan = $_GET['id_karyawan'] ?? null;

// Proses update 
if (isset($_POST['update'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $update = mysqli_query($conn, "UPDATE karyawan SET 
        nama_karyawan = '$nama_karyawan',
        jabatan = '$jabatan',
        alamat = '$alamat',
        telepon = '$telepon'
        WHERE id_karyawan = $id_karyawan
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }
}

$query = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan = '$id_karyawan'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan");
}

?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Data Karyawan</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan'] ?>">

                <div class="mb-3">
                    <label class="form-label">ID Karyawan</label>
                    <input type="text" name="id_karyawan" class="form-control" value="<?= $data['id_karyawan'] ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_karyawan" class="form-control" value="<?= $data['nama_karyawan'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?= $data['telepon'] ?>" required>
                </div>

                <button type="submit" name="update" class="btn btn-success">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>