<?php
include '../config.php';

if (isset($_GET['id_karyawan']) && !empty($_GET['id_karyawan'])) {
    $id_karyawan = ($_GET['id_karyawan']);
    $query = mysqli_query($conn, "DELETE FROM karyawan WHERE id_karyawan = $id_karyawan");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>