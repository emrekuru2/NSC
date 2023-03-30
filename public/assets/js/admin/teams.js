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
removeMemberButtons.forEach( (buttonElement) => {
    buttonElement.addEventListener('click', (event) => {
        let button = event.target

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
    if (teamMemberTableBody.dataset.teamIsset === '0' && !teamMembersChanged) return ''

    let teamJSON = { 'players': [] }
    for (let i = 0; i < teamMemberTableBody.children.length; i++) {
        let player = []

        player.push(teamMemberTableBody.children[i].children[3].children[0].dataset.user) // ID
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

function updateAddMembersList() {
    let teamMembersArray = []
    for (let i = 0; i < removeMemberButtons.length; i++) {
        let name = removeMemberButtons[i].dataset.name
        if (name === 'none') break

        teamMembersArray.push(name)
    }

    for (let i = 0; i < addMemberTable.children.length; i++) {
        let name = addMemberTable.children[i].children[0].innerText
        if (name === 'No users available') break

        if (teamMembersArray.includes(name)) {
            addMemberTable.children[i].remove()
            i--
        }
    }

    if (addMemberTable.children.length === 0) {
        document.getElementById('add-member-table').classList.remove('table-hover')

        let tr = document.createElement('tr')

        let td = document.createElement('td')
        td.classList.add('col-7')
        td.classList.add('line-height-2rem')
        td.innerText = 'No users available'
        tr.appendChild(td)

        td = document.createElement('td')
        td.classList.add('col-4')
        tr.appendChild(td)

        td = document.createElement('td')
        td.classList.add('col-1')
        tr.appendChild(td)

        addMemberTable.appendChild(tr)
    }
}


// Executions
updateAddMembersList()