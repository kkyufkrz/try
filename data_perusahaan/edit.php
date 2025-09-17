<?php
include '../config.php';
include '../partials/header.php';

$id_perusahaan = $_GET['id_perusahaan'] ?? null;

// Proses update 
if (isset($_POST['update'])) {
    $id_perusahaan = $_POST['id_perusahaan'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $update = mysqli_query($conn, "UPDATE perusahaan SET 
        nama_perusahaan = '$nama_perusahaan',
        alamat = '$alamat',
        telepon = '$telepon'
        WHERE id_perusahaan = $id_perusahaan
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }
}

$query = mysqli_query($conn, "SELECT * FROM perusahaan WHERE id_perusahaan = '$id_perusahaan'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan");
}

?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Data Perusahaan</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="id_perusahaan" value="<?= $data['id_perusahaan'] ?>">

                <div class="mb-3">
                    <label class="form-label">ID Perusahaan</label>
                    <input type="text" name="id_perusahaan" class="form-control" value="<?= $data['id_perusahaan'] ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_perusahaan" class="form-control" value="<?= $data['nama_perusahaan'] ?>" required>
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