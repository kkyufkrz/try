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
          columns: [0, 1, 2, 3, 4, 5]
        }
      },
      {
        extend: 'csv',
        className: 'btn btn-primary btn-sm',
        filename: fileName || 'Data_Export',
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5]
        }
      },
      {
        extend: 'excel',
        className: 'btn btn-primary btn-sm',
        filename: fileName || 'Data_Export',
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5]
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
          columns: [0, 1, 2, 3, 4, 5]
        },
        customize: function (doc) {
          doc.defaultStyle.fontSize = 10;
          doc.styles.tableHeader.fontSize = 11;
          doc.styles.tableHeader.fillColor = '#007bff';
          doc.styles.tableHeader.color = 'white';
          doc.content[1].table.widths = ['*', '*', '*', '*', '*', '*'];
          doc.content[1].margin = [0, 10, 0, 0];
        }
      },
      {
        extend: 'print',
        className: 'btn btn-primary btn-sm',
        title: titleRaw || 'Data Export',
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5]
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