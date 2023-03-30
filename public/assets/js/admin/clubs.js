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
const clubMemberTableBody = document.getElementById('club-member-list')
const clubMemberRoles = document.getElementsByName('role')

let clubMembersChanged = false


// Listeners
removeMemberButtons.forEach( (buttonElement) => {
    buttonElement.addEventListener('click', (event) => {
        let button = event.target
        let message = removeMemberMessage.innerText

        removeMemberHiddenInput.value = button.dataset.user
        let clubName = message.substring(message.indexOf("from the") + 9 , message.indexOf("?"))

        removeMemberMessage.innerHTML = 'Are you sure you want to remove the ' + '<b>' + button.dataset.name + '</b>' + ' team from the ' + '<b>' + clubName + '</b>' + '?'
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
    roleSelect.addEventListener('change', () => {
        clubMembersChanged = true
    })
})


// Functions
function getClubMemberRolesJSON() {
    if (clubMemberTableBody.dataset.clubIsset === '0' && !clubMembersChanged ||
        clubMemberTableBody.children[0].children[0].innerText === 'No club members') return ''

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
        let name = removeMemberButtons[i].dataset.name
        if (name === 'none') break

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