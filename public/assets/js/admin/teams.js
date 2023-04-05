// Variables
// Removing Members
const removeMemberButtons = document.getElementsByName('remove-member-button')
const removeMemberHiddenInput = document.getElementById('remove-member-id')
const removeMemberMessage = document.getElementById('remove-member-message')

// Adding Members
const addMembersForm = document.getElementById('addMemberModal')
const addMembersButton = document.getElementById('add-member-button')
const addMemberTable = document.getElementById('add-member-list')
const addMemberChecks = document.getElementsByName('add-member-check')
const addMemberRoles = document.getElementsByName('add-member-role')

// Updating Team
const updateForm = document.getElementById('update-form')
const updateButton = document.getElementById('update-button')
const teamMemberTableBody = document.getElementById('team-member-list')
const teamMemberRoles = document.getElementsByName('role')
let teamMembersChanged = false

// Edit/View Mode
const editButton = document.getElementById('edit-team-button')
const cancelEditButton = document.getElementById('cancel-edit-team-button')
const editTeamCard = document.getElementById('edit-team-card')
const viewTeamCard = document.getElementById('view-team-card')
let editMode = false

// Listeners
removeMemberButtons.forEach( (buttonElement) => {
    buttonElement.addEventListener('click', (event) => {
        let button = event.target
        let memberName = button.dataset.name
        removeMemberHiddenInput.value = button.dataset.user

        memberName = memberName.replace('|', ' ')
        let teamName = removeMemberMessage.innerText
        removeMemberMessage.innerHTML = 'Are you sure you want to remove ' + '<b>' + memberName + '</b>' + ' from the ' + '<b>' + teamName + '</b>' + ' team?'
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

editButton.addEventListener('click', toggleEditMode)

cancelEditButton.addEventListener('click', toggleEditMode)

// Functions
function getMemberRolesJSON() {
    if (teamMemberTableBody.dataset.teamIsset === '0' && !teamMembersChanged ||
        teamMemberTableBody.children[0].children[0].innerText === 'No team members') return ''

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

    let isChecked = false
    for (let i = 0; i < addMemberChecks.length; i++) {
        if (addMemberChecks[i].checked) {
            isChecked = true
            let member = []

            let id = addMemberChecks[i].value
            if (id !== 'none') {
                member.push(id) // ID
                member.push(addMemberRoles[i].value) // Role
                membersJSON.members.push(member)
            }
        }

        if (i === addMemberChecks.length-1 && ! isChecked) {
            return ''
        }
    }
    return JSON.stringify(membersJSON)
}

function updateAddMembersList() {
    let teamMembersArray = []
    for (let i = 0; i < removeMemberButtons.length; i++) {
        let name = removeMemberButtons[i].dataset.name.replace('|', ' ')
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

function toggleEditMode() {
    if (editMode) {
        editTeamCard.hidden = true
        viewTeamCard.hidden = false
        editMode = false
    } else {
        editTeamCard.hidden = false
        viewTeamCard.hidden = true
        editMode = true
    }
}

// Executions
updateAddMembersList()
editTeamCard.hidden = true