<?php include_once __DIR__ . '/../config.php'; ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SB Admin JS -->
<!-- <script src="<?= $BASE_URL ?>assets/js/sb-admin-2.min.js"></script> -->

<!-- DataTables Core -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTables Buttons + Export Plugins -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<!-- <script src="<?= $BASE_URL ?>assets/js/datatables.js"></script> -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Untuk form search
    const searchForm = document.getElementById("searchForm");
    if (searchForm) {
        searchForm.addEventListener("submit", function(e) {
            e.preventDefault(); // Cegah form submit default
            const kategori = document.getElementById("kategori").value;
            const query = this.querySelector('input[name="q"]').value.trim();

            if (kategori && query) {
                window.location.href = kategori + "/index.php?q=" + encodeURIComponent(query);
            }
        });
    }

    // Untuk tombol login
    const btn = document.getElementById('btnLogin');
    if (btn) {
        btn.addEventListener('click', function () {
            // aksi login
        });
    }
});

</script>

</body>
</html>