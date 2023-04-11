let clubInfoButtons = document.getElementsByName('club-button');
let clubJsons = document.getElementsByName('club-json');

for (let i = 0; i < clubInfoButtons.length; i++) {
    //adds click event listener to club bottons
    clubInfoButtons[i].addEventListener('click', runModal.bind(this, i));
}

function runModal(j) {
    let json = JSON.parse(clubJsons[j].value);
    document.getElementById('modal-header').innerText = json.cName

    document.getElementById('modal-description').innerText = json.description

    if (json.email !== 'N/A') {
        document.getElementById('modal-email').innerText = json.email
        document.getElementById('modal-email').setAttribute('href', "mailto: " + json.email)
    } else {
        document.getElementById('modal-email').innerText = 'N/A'
        document.getElementById('modal-email').removeAttribute('href')
    }

    if (json.website !== 'N/A') {
        document.getElementById('modal-site').innerText = json.website
        document.getElementById('modal-site').setAttribute('href', json.website)
    } else {
        document.getElementById('modal-site').innerText = 'N/A'
        document.getElementById('modal-site').removeAttribute('href')
    }

    document.getElementById('modal-phone').innerText = json.phone

    if (json.facebook !== 'N/A') {
        document.getElementById('modal-fb').innerText = json.facebook
        document.getElementById('modal-fb').setAttribute('href', json.facebook)
    } else {
        document.getElementById('modal-fb').innerText = 'N/A'
        document.getElementById('modal-fb').removeAttribute('href')
    }
}