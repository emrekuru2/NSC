let teamInfoButtons = document.getElementsByName('team-button');
let teamJsons = document.getElementsByName('team-json');

for (let i = 0; i < teamInfoButtons.length; i++) {
    //adds click event listener to team bottons
    teamInfoButtons[i].addEventListener('click', runModal.bind(this, i));
}

function runModal(j) {
    let json = JSON.parse(teamJsons[j].value);
    document.getElementById('modal-header').innerText = json.tName

    document.getElementById('modal-description').innerText = json.description
}