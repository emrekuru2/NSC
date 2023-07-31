function show_name() {

  var table = document.getElementById("table1");
  for (var i = 0; i < table.rows.length; i++) {
    var row = table.rows[i];
    row.cells[0].style.display = "";
    row.cells[1].style.display = "none";
    row.cells[2].style.display = "none";
    row.cells[3].style.display = "none";
    row.cells[4].style.display = "none";
  }

}

function show_surname() {
  var table = document.getElementById("table1");
  for (var i = 0; i < table.rows.length; i++) {
    var row = table.rows[i];
    row.cells[0].style.display = "none";
    row.cells[1].style.display = "";
    row.cells[2].style.display = "none";
    row.cells[3].style.display = "none";
    row.cells[4].style.display = "none";
  }
}

function show_teams() {
  var table = document.getElementById("table1");
  for (var i = 0; i < table.rows.length; i++) {
    var row = table.rows[i];
    row.cells[0].style.display = "none";
    row.cells[1].style.display = "none";
    row.cells[2].style.display = "";
    row.cells[3].style.display = "none";
    row.cells[4].style.display = "none";
  }
}

function show_clubs() {
  var table = document.getElementById("table1");
  for (var i = 0; i < table.rows.length; i++) {
    var row = table.rows[i];
    row.cells[0].style.display = "none";
    row.cells[1].style.display = "none";
    row.cells[2].style.display = "none";
    row.cells[3].style.display = "";
    row.cells[4].style.display = "none";
  }
}

function show_roles() {
  var table = document.getElementById("table1");
  for (var i = 0; i < table.rows.length; i++) {
    var row = table.rows[i];
    row.cells[0].style.display = "none";
    row.cells[1].style.display = "none";
    row.cells[2].style.display = "none";
    row.cells[3].style.display = "none";
    row.cells[4].style.display = "";
  }
}
