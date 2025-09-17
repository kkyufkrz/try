<?php
include '../config.php';

if (isset($_GET['id_penggajian']) && !empty($_GET['id_penggajian'])) {
    $id_penggajian = ($_GET['id_penggajian']);
    $query = mysqli_query($conn, "DELETE FROM penggajian WHERE id_penggajian = $id_penggajian");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>