// function invoking ajax with pure javascript, no jquery required.
'use strict';
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

function unassignPlayers(userID) {
  var stringIDs = "";
  if(lstSelected.length > 0) {
    for(var i = 0; i < lstSelected.length; i++) {
      stringIDs += lstSelected[i].id
      if(i != lstSelected.length -1) {
        stringIDs += "-"
      }
    }

    // Initialize connection and Get Request with complete attribute
    let ajaxObj = new XMLHttpRequest();
    
    // Open Connection
    ajaxObj.open("GET", "includes/functions/manageTeam.php?len="+lstSelected.length+"&u="+stringIDs+"&id="+userID, false);
    ajaxObj.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    // Checking the response
    ajaxObj.onreadystatechange = function() {
        if (ajaxObj.readyState == 4 && ajaxObj.status == 200) {
            console.log(ajaxObj.status);
            document.getElementById('player-team-input').innerHTML = ajaxObj.responseText;
            console.log(ajaxObj.responseText)
        }
    }

    // Sending Get Request
    ajaxObj.send();
    window.location.href = "/manageTeam.php";
  } else {
    document.getElementById('player-team-input-unassign').innerHTML = "<div class='alert alert-warning' role='alert'> No player selected </div>";
  }
}

function movePlayers(userID) {
  let teamName = document.getElementById('newTeam').value;
  var stringIDs = "";

  if(lstSelected.length > 0) {
    for(var i = 0; i < lstSelected.length; i++) {
      stringIDs += lstSelected[i].id;
      if(i != lstSelected.length -1) {
        stringIDs += "-";
      }
    }

    // Initialize connection and Get Request with complete attribute
    let ajaxObj = new XMLHttpRequest();
    
    // Open Connection
    ajaxObj.open("GET", "includes/functions/manageTeam.php?len="+lstSelected.length+"&m="+stringIDs+"&t="+teamName +"&id="+userID, false);
    ajaxObj.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    // Checking the response
    ajaxObj.onreadystatechange = function() {
        if (ajaxObj.readyState == 4 && ajaxObj.status == 200) {
            document.getElementById('player-team-input').innerHTML = ajaxObj.responseText;
        }
    }

    // Sending Get Request
    ajaxObj.send();
    window.location.href = "/manageTeam.php";
  } else {
    document.getElementById('player-team-input').innerHTML = "<div class='alert alert-warning' role='alert'> No player selected </div>";
  }
}