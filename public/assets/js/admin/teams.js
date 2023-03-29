// Variables
const removeMemberButtons = document.getElementsByName('remove-member-button')
const removeMemberHiddenInput = document.getElementById('remove-member-id')
const removeMemberMessage = document.getElementById('remove-member-message')

const addMembersForm = document.getElementById('addMemberModal')
const addMembersButton = document.getElementById('add-member-button')
const addMemberTable = document.getElementById('add-member-list')
const addMemberChecks = document.getElementsByName('add-member-check')
const addMemberRoles = document.getElementsByName('add-member-role')

const updateForm = document.getElementById('update-form')
const updateButton = document.getElementById('update-button')
const teamMemberTableBody = document.getElementById('team-member-list')
const teamMemberRoles = document.getElementsByName('role')

let teamMembersChanged = false


// Listeners
removeMemberButtons.forEach( (button) => {
    button.addEventListener('click', () => {
        let message = removeMemberMessage.innerText

        removeMemberHiddenInput.value = button.dataset.user
        let firstHalf = message.substring(0, 32)
        let secondHalf = message.substring(message.indexOf("from") - 1)

        removeMemberMessage.innerText = firstHalf + button.dataset.name + secondHalf
    })
})

updateButton.addEventListener('click', () => {
    document.getElementById('update-members-JSON').value = getMemberRolesJSON();
    updateForm.submit()
})

addMembersButton.addEventListener('click', () => {
    document.getElementById('add-members-JSON').value = getAddedMembersJSON();
    addMembersForm.submit()
})

teamMemberRoles.forEach( (roleSelect) => {
    roleSelect.addEventListener('change', () => {
        teamMembersChanged = true
    })
})


// Functions
function getMemberRolesJSON() {
    if (teamMemberTableBody.children[0].dataset.user === 'none' || !teamMembersChanged) return ''

    let teamJSON = { 'players': [] }
    for (let i = 0; i < teamMemberTableBody.children.length; i++) {
        let player = []

        player.push(teamMemberTableBody.children[i].dataset.user) // ID
        player.push(teamMemberTableBody.children[i].children[1].children[0].value) // Role
        teamJSON.players.push(player)
    }

    return JSON.stringify(teamJSON)
}

function getAddedMembersJSON() {
    let membersJSON = { 'members': [] }

    for (let i = 0; i < addMemberChecks.length; i++) {
        if (addMemberChecks[i].checked) {
            let member = []

            let id = addMemberChecks[i].value
            if (id !== 'none') {
                member.push(id) // ID
                member.push(addMemberRoles[i].value) // Role
                membersJSON.members.push(member)
            }
        }
    }
    return JSON.stringify(membersJSON)
}


// Executions
let teamMembers = []
for (let i = 0; i < removeMemberButtons.length; i++) {
    let name = removeMemberButtons[i].dataset.name

    if (name !== 'none') {
        teamMembers.push(name)
        console.log('Team member: ' + name)
    }
}

for (let i = 0; i < addMemberTable.children.length; i++) {
    let name = addMemberTable.children[i].children[0].innerText

    console.log('Removing member from list: ' + name)
    addMemberTable.children[i].remove()
}



// let teamMembers = []
// const teamMemberElements = teamMemberTableBody.children
// for (let i = 0; i < teamMemberTableBody.children.length; i++) {
//     let name = teamMemberTableBody.children[i].children[0].children[0].innerText
//
// }
//
//
// for (let i = 0; i < addMemberTable.children.length; i++) {
//     allTeamMembers.push(tableRows2[i].dataset.name)
// }
//
// for (let i = 0; i < allTeamMembers.length; i++) {
//     for (let j = 0; j < teamMembers.length; j++) {
//         if (teamMembers[j] === allTeamMembers[i]) {
//             addMemberTable.deleteRow(i)
//             i--
//             break
//         }
//     }
// }
//
// // If there are no members in the addMemberTable, disable the addMembersButton
// if (addMemberTable.children.length === 0) {
//     addMembersButton.disabled = true
// }
//
// // If there are no members in the teamMemberTable, set the dataset to false
// if (teamMemberTableBody.children.length === 0) {
//     teamMemberTableBody.dataset.membersIsSet = false
// }
