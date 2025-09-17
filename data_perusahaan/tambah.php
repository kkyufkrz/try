<?php ob_start(); ?>
<?php include '../config.php'; ?>
<?php include '../partials/header.php'; ?>

<div id="wrapper">
    <?php include '../partials/sidebar.php'; ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include '../partials/navbar.php'; ?>

            <div class="container-fluid mt-4">
                <h1 class="h3 mb-4 text-gray-800">Tambah Data Perusahaan</h1>
                
                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">ID Perusahaan</label>
                                <input type="text" name="id_perusahaan" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" name="telepon" class="form-control" required>
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
    $id_perusahaan = $_POST['id_perusahaan'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $insert = mysqli_query($conn, "INSERT INTO perusahaan (id_perusahaan, nama_perusahaan, alamat, telepon) VALUES (
       '$id_perusahaan', '$nama_perusahaan', '$alamat', '$telepon'
    )");

    if ($insert) {
        header("Location: index.php");
        exit;

    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>
<?php ob_end_flush(); ?>