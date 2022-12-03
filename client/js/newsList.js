// function invoking ajax with pure javascript, no jquery required.
'use strict';
var lstSelected = [];

function changeLstSelected(newsID) {
    
  // If the lst is empty add
  let newsTitle = document.getElementById("checkboxNews-" + newsID).value;
  let newsObj = {id:newsID, title:newsTitle};
  if(lstSelected.length == 0) {

    lstSelected.push(newsObj);
  } else {
    // if the list has other elements, if the playerID is already in the list then unselect
    if (lstSelected.find(news => news.id == newsID) != undefined) {
      lstSelected.pop(news => news.id == newsID);
    }
    else {
      lstSelected.push(newsObj);
    }
  }

  if(lstSelected.length == 0) {document.getElementById("news-delete-display").innerHTML = "<input class='form-control mt-1' placeholder='No News Selected' id='display' disabled>";}

  document.getElementById("news-delete-display").innerHTML = " ";
  lstSelected.forEach( element => {
    let newsText = "<input class='form-control mt-1' placeholder='" + element.title +"' disabled>";
    document.getElementById("news-delete-display").innerHTML += newsText;
  })
}

function deleteNews(userID) {
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
    ajaxObj.open("GET", "includes/functions/manageNews.php?len="+lstSelected.length+"&d="+stringIDs+"&id="+userID, false);
    ajaxObj.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    // Checking the response
    ajaxObj.onreadystatechange = function() {
        if (ajaxObj.readyState == 4 && ajaxObj.status == 200) {
            console.log(ajaxObj.status);
            document.getElementById('news-delete-display').innerHTML = ajaxObj.responseText;
            console.log(ajaxObj.responseText)
        }
    }

    // Sending Get Request
    ajaxObj.send();
    window.location.href = "/news.php";
  } else {
    document.getElementById('news-delete-display').innerHTML = "<div class='alert alert-warning' role='alert'> No news selected </div>";
  }
}