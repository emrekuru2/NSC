// Variables
const removeMemberButtons = document.getElementsByName('remove-member-button')
const removeMemberHiddenInput = document.getElementById('remove-member-name')
const removeMemberMessage = document.getElementById('remove-member-message')

const removeTeamButtons = document.getElementsByName('remove-team-button')
const removeTeamHiddenInput = document.getElementById('remove-team-name')
const removeTeamMessage = document.getElementById('remove-team-message')

const addMembersForm = document.getElementById('addMemberModal')
const addMembersButton = document.getElementById('add-member-button')
const addMembersTable = document.getElementById('add-member-list')
const addMembersChecks = document.getElementsByName('add-member-check')
const addMemberRoles = document.getElementsByName('add-member-role')

const addTeamsForm = document.getElementById('addTeamToClubModal')
const addTeamsChecks = document.getElementsByName('add-teams-check')
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
        let memberName = button.dataset.name
        removeMemberHiddenInput.value = memberName

        memberName = memberName.replace('|', '\ ')
        let clubName = removeMemberMessage.innerText
        removeMemberMessage.innerHTML = 'Are you sure you want to remove ' + '<b>' + memberName + '</b>' + ' from the ' + '<b>' + clubName + '</b>' + '?'

    })
})

updateButton.addEventListener('click', () => {
    document.getElementById('update-members-JSON').value = getClubMemberRolesJSON();
    updateForm.submit()
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
    for (let i = 0; i < addTeamsChecks.length; i++) {
        if (addTeamsChecks[i].checked) {
            teamsJSON.teams.push(addTeamsChecks[i].value)
        }
    }
    document.getElementById('add-teams-JSON').value = JSON.stringify(teamsJSON)
    addTeamsForm.submit()
})


// Functions
function getClubMemberRolesJSON() {
    if (clubMemberTableBody.dataset.clubIsset === '0' ||
        clubMemberTableBody.children[0].children[0].innerText === 'No club members') return ''

    let clubJSON = { 'members': [] }
    for (let i = 0; i < clubMemberTableBody.children.length; i++) {
        let member = []

        member.push(clubMemberTableBody.children[i].children[3].children[0].dataset.name) // Name
        member.push(clubMemberTableBody.children[i].children[1].children[0].value) // Role
        clubJSON.members.push(member)
    }

    console.log(clubJSON)
    return JSON.stringify(clubJSON)
}

function getAddedClubMembersJSON() {
    let membersJSON = { 'members': [] }

    for (let i = 0; i < addMembersChecks.length; i++) {
        if (addMembersChecks[i].checked) {
            let member = []

            let id = addMembersChecks[i].value
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
        name = removeMemberButtons[i].dataset.name.replace('|', ' ')
        clubMembersArray.push(name)
    }

    for (let i = 0; i < addMembersTable.children.length; i++) {
        let name = addMembersTable.children[i].children[0].innerText
        if (name === 'No users available') break

        if (clubMembersArray.includes(name)) {
            addMembersTable.children[i].remove()
            i--
        }
    }

    if (addMembersTable.children.length === 0) {
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

        addMembersTable.appendChild(tr)
    }
}


// Executions
updateAddMembersList()