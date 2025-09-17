<?php
include '../config.php';

if (isset($_GET['id_perusahaan']) && !empty($_GET['id_perusahaan'])) {
    $id_perusahaan = ($_GET['id_perusahaan']);
    $query = mysqli_query($conn, "DELETE FROM perusahaan WHERE id_perusahaan = $id_perusahaan");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>