// Variables
const removeMemberButtons = document.getElementsByName('remove-member-button')
const removeMemberHiddenInput = document.getElementById('remove-member-id')
const removeMemberMessage = document.getElementById('remove-member-message')
const updateForm = document.getElementById('update-form')
const updateButton = document.getElementById('update-button')
const teamMemberTableBody = document.getElementById('team-member-list')


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

updateButton.addEventListener('click', () => {
    document.getElementById('update-members-JSON').value = getMemberRolesJSON();
    updateForm.submit()
})


// Functions
function getMemberRolesJSON() {
    let teamJSON =
    {
        'players': []
    }

    if (teamMemberTableBody.dataset.membersIsSet === 'false') {
        return ""
    }

    const tableRows = teamMemberTableBody.children
    for (let i = 0; i < tableRows.length; i++) {
        let player = []

        let id = tableRows[i].dataset.user
        if (id !== 'none') {
            player.push(id) // ID
            player.push(tableRows[i].children[1].children[0].value) // Role
            teamJSON.players.push(player)
        }
    }

    return JSON.stringify(teamJSON)
}