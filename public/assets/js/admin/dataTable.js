$(document).ready(function () {
  $("table.display").DataTable({
    paging: false,
    searching: false,
    info: false,
    columnDefs: [{ targets: "no-sorting", orderable: false }],
  });
});
