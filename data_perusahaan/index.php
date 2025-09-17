<?php
include_once '../config.php';
include '../partials/header.php'; 

//Untuk Pencarian
$q = $_GET['q'] ?? '';
$query = "SELECT * FROM perusahaan";
$result = mysqli_query($conn, $query);
?>

    <div id="wrapper">
        
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

                <!-- Navbar -->
                <?php include '../partials/navbar.php'; ?>
                
                <!-- Begin Page Content -->
                <div class="container-fluid ps-4 pe-4">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 font-weight-bold">Data Perusahaan</h1>
                    <p class="mb-4">Halaman ini menampilkan seluruh data perusahaan yang tersimpan</p>

                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Detail Perusahaan</h6> -->
                            <a href="tambah.php" class="btn btn-primary btn-sm float-right">+ Tambah Perusahaan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Company</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM perusahaan");
                                        function highlight($text, $keyword) {
                                            if (!$keyword) return htmlspecialchars($text);
                                            return preg_replace("/(" . preg_quote($keyword, '/') . ")/i", "<span class='highlight'>$1</span>", htmlspecialchars($text));
                                        }

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['id_perusahaan']) . "</td>";
                                            echo "<td>" . highlight($row['nama_perusahaan'], $q) . "</td>";
                                            echo "<td>" . highlight($row['alamat'], $q) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['telepon']) . "</td>";
                                            echo "<td>
                                                <a href='edit.php?id_perusahaan=" . $row['id_perusahaan'] . "' class='btn btn-sm btn-warning'>Edit</a>
                                                <a href='hapus.php?id_perusahaan=" . $row['id_perusahaan'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                                            </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End DataTales -->
                </div>

            </div>

        </div>

    </div>

<!-- Footer -->
<?php include '../partials/footer.php'; ?>

<script>
$(document).ready(function () {
  let titleRaw = $('h1').first().text().trim();
  let fileName = titleRaw.replace(/\s+/g, '_');

  $('#dataTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'copy',
        className: 'btn btn-primary btn-sm',
        exportOptions: {
          columns: [0, 1, 2, 3]
        }
      },
      {
        extend: 'csv',
        className: 'btn btn-primary btn-sm',
        filename: fileName || 'Data_Export',
        exportOptions: {
          columns: [0, 1, 2, 3]
        }
      },
      {
        extend: 'excel',
        className: 'btn btn-primary btn-sm',
        filename: fileName || 'Data_Export',
        exportOptions: {
          columns: [0, 1, 2, 3]
        }
      },
      {
        extend: 'pdfHtml5',
        className: 'btn btn-primary btn-sm',
        filename: fileName || 'Data_Export',
        title: titleRaw || 'Data Export',
        orientation: 'landscape',
        pageSize: 'A4',
        exportOptions: {
          columns: [0, 1, 2, 3]
        },
        customize: function (doc) {
          doc.defaultStyle.fontSize = 10;
          doc.styles.tableHeader.fontSize = 11;
          doc.styles.tableHeader.fillColor = '#007bff';
          doc.styles.tableHeader.color = 'white';
          doc.content[1].table.widths = ['*', '*', '*', '*'];
          doc.content[1].margin = [0, 10, 0, 0];
        }
      },
      {
        extend: 'print',
        className: 'btn btn-primary btn-sm',
        title: titleRaw || 'Data Export',
        exportOptions: {
          columns: [0, 1, 2, 3]
        },
        customize: function (win) {
          $(win.document.body).css('font-size', '10pt');
          $(win.document.body).find('h1')
            .css('margin-top', '20px')
            .css('margin-bottom', '20px')
            .css('text-align', 'center');
        }
      }
    ]
  });
});
</script>