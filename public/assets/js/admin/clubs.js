// Variables
const removeMemberButtons = document.getElementsByName('remove-member-button')
const removeMemberHiddenInput = document.getElementById('remove-member-name')
const removeMemberMessage = document.getElementById('remove-member-message')

const removeTeamForm = document.getElementById('removeTeamModal')
const removeTeamButtons = document.getElementsByName('remove-team-button')
const removeTeamHiddenInput = document.getElementById('remove-team-name')
const removeTeamMessage = document.getElementById('remove-team-message')

const addMembersForm = document.getElementById('addMemberModal')
const addMembersButton = document.getElementById('add-member-button')
const addMemberTable = document.getElementById('add-member-list')
const addMemberChecks = document.getElementsByName('add-member-check')
const addMemberRoles = document.getElementsByName('add-member-role')

const addTeamsForm = document.getElementById('addTeamToClubModal')
const addTeamChecks = document.getElementsByName('add-teams-check')
const addTeamsButton = document.getElementById('add-teams-button')

const updateForm = document.getElementById('update-form')
const updateButton = document.getElementById('update-button')
const clubMemberTableBody = document.getElementById('club-member-list')
const clubMemberRoles = document.getElementsByName('role')

let clubMembersChanged = false


// Listeners
removeMemberButtons.forEach( (buttonElement) => {
    buttonElement.addEventListener('click', (event) => {
        let button = event.target
        let message = removeMemberMessage.innerText

        removeMemberHiddenInput.value = button.dataset.name
        let clubName = message.substring(message.indexOf("from the") + 9 , message.indexOf("?"))

        removeMemberMessage.innerHTML = 'Are you sure you want to remove  ' + '<b>' + button.dataset.name.replace(',', ' ') + '</b>' + ' from the ' + '<b>' + clubName + '</b>' + '?'
    })
})

updateButton.addEventListener('click', () => {
    document.getElementById('update-members-JSON').value = getClubMemberRolesJSON();
    //updateForm.submit()
})

addMembersButton.addEventListener('click', () => {
    document.getElementById('add-members-JSON').value = getAddedClubMembersJSON();
    addMembersForm.submit()
})

clubMemberRoles.forEach( (roleSelect) => {
    roleSelect.addEventListener('change', () => clubMembersChanged = true)
})

removeTeamButtons.forEach( (buttonElement) => {
    buttonElement.addEventListener('click', (event) => {
        let button = event.target
        removeTeamHiddenInput.value = button.dataset.name

        let clubName = removeTeamMessage.innerText
        removeTeamMessage.innerHTML = 'Are you sure you want to remove the ' + '<b>' + button.dataset.name + '</b>' + ' team from the ' + '<b>' + clubName + '</b>' + '?'
    })
})

addTeamsButton.addEventListener('click', () => {
    let teamsJSON = { 'teams': [] }
    for (let i = 0; i < addTeamChecks.length; i++) {
        if (addTeamChecks[i].checked) {
            teamsJSON.teams.push(addTeamChecks[i].value)
        }
    }
    document.getElementById('add-teams-JSON').value = JSON.stringify(teamsJSON)
    addTeamsForm.submit()
})

document.querySelectorAll('input[type=tel]').forEach((input) => {
    input.addEventListener('change', () => {
        let phone = input.value
        if (phone.length === 10 && (phone.match(new RegExp("/-/", "g")) || []).length === 0 ||
            phone.length === 12 && (phone.match(new RegExp("/-/", "g")) || []).length === 1)
        {
            input.value = phone.substring(0, 3) + '-' + phone.substring(3, 6) + '-' + phone.substring(6, 10)
        }
    })
})

// Functions
function getClubMemberRolesJSON() {
    if (clubMemberTableBody.dataset.clubIsset === '0' && clubMemberTableBody.children[0].children[0].innerText === 'No club members') return ''

    let clubJSON = { 'members': [] }
    for (let i = 0; i < clubMemberTableBody.children.length; i++) {
        let member = []

        member.push(clubMemberTableBody.children[i].children[0].innerText) // Name
        member.push(clubMemberTableBody.children[i].children[1].children[0].value) // Role
        clubJSON.members.push(member)
    }

    console.log(clubJSON)
    return JSON.stringify(clubJSON)
}

function getAddedClubMembersJSON() {
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
    let clubMembersArray = []
    for (let i = 0; i < removeMemberButtons.length; i++) {
        name = removeMemberButtons[i].dataset.name.replace(',', ' ')
        clubMembersArray.push(name)
    }

    for (let i = 0; i < addMemberTable.children.length; i++) {
        let name = addMemberTable.children[i].children[0].innerText
        if (name === 'No users available') break

        if (clubMembersArray.includes(name)) {
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