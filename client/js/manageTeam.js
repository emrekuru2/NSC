// function invoking ajax with pure javascript, no jquery required.
var lstSelected = [];

function changeLstSelected(playerID, playerName) {
  // If the lst is empty add
  playerName = document.getElementById("player-team" + playerID).value;
  let playerObj = {id:playerID, name:playerName};
  if(lstSelected.length == 0) {
    lstSelected.push(playerObj);
  } else {
    // if the list has other elements, if the playerID is already in the list then unselect
    if (lstSelected.find(player => player.id == playerID) != undefined) {

      let indexPlayer = lstSelected.findIndex(player => player.id == playerID);
      lstSelected.pop(player => player.id == playerID);
    }
    else {
      lstSelected.push(playerObj);
    }
  }
    document.getElementById("player-team-input").innerHTML = " ";
    lstSelected.forEach( element => {
      let playerText = "<input class='form-control mt-1' placeholder='" + element.name +"' disabled>";
      document.getElementById("player-team-input").innerHTML += playerText;
    })

    if(lstSelected.length == 0) {document.getElementById("player-team-input").innerHTML = "<input class='form-control mt-1' placeholder='No Player Selected' id='display' disabled>";}

    document.getElementById("player-team-input-unassign").innerHTML = " ";
    lstSelected.forEach( element => {
      let playerText = "<input class='form-control mt-1' placeholder='" + element.name +"' disabled>";
      document.getElementById("player-team-input-unassign").innerHTML += playerText;
    })

    if(lstSelected.length == 0) {document.getElementById("player-team-input-unassign").innerHTML = "<input class='form-control mt-1' placeholder='No Player Selected' id='display' disabled>";}
}

function myFunction(value_myfunction) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("player-team-input").innerHTML += this.responseText; 
      }
    };
    xmlhttp.open("GET", "ajax-php-page.php?sendValue=" + value_myfunction, true);
    xmlhttp.send();
  }