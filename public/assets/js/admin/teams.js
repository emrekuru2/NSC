// Variables
let removeMemberButtons = document.getElementsByName('remove-member-button')
let removeMemberHiddenInput = document.getElementById('remove-member-id').value
let removeMemberMessage = document.getElementById('remove-member-message').innerText

// Listeners
for (let i = 0; i < removeMemberButtons.length; i++) {
    removeMemberButtons[i].addEventListener('click', () => {
        removeMemberHiddenInput = removeMemberButtons[i].dataset.user

        //let message = 'Are you sure you want to remove TEST NAME from the <?= $team->name ?> team?' + removeTeamMemberButtons[i].dataset.name + '\ team?'
        //message.indexOf('remove')
        //
        let firstHalf = removeMemberMessage.substring(0, 32)
        let secondHalf = removeMemberMessage.substring(removeMemberMessage.indexOf("from") - 1)

        let message = firstHalf + removeMemberButtons[i].dataset.name + secondHalf
        console.log(message)

        removeMemberMessage = message
    })
}

