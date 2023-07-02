/* 
  This library already includes a search function, however, this
  project uses a different js library to search the table values. 
  Check 'views/components/search.php' for its configuration.
*/
$(document).ready(function () {
  $("table.display").DataTable({
    paging: false,
    searching: false,
    info: false,
    columnDefs: [{ targets: "no-sorting", orderable: false }],
  });
});
