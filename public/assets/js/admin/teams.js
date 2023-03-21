// Variables
let removeMemberButtons = document.getElementsByName('remove-member-button')
let removeMemberHiddenInput = document.getElementById('remove-member-id')
let removeMemberMessage = document.getElementById('remove-member-message')

// Listeners
for (let i = 0; i < removeMemberButtons.length; i++) {
    removeMemberButtons[i].addEventListener('click', () => {
        let message = removeMemberMessage.innerText

        removeMemberHiddenInput.value = removeMemberButtons[i].dataset.user
        let firstHalf = message.substring(0, 32)
        let secondHalf = message.substring(message.indexOf("from") - 1)

        removeMemberMessage.innerText = firstHalf + removeMemberButtons[i].dataset.name + secondHalf
    })
}


// Functions
function getMemberRolesJSON() {
    let JSON =
    {
        'players': []
    }

    const tableRows = document.querySelectorAll('tr')
    for (let i = 1; i < tableRows.length; i++) {
        let player = []
        player.push(tableRows[i].children[0].innerText) // Name
        player.push(tableRows[i].children[1].value) // Role

        JSON.players.push(player)
    }

    return JSON
}