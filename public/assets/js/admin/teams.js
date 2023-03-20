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
function getMemberRoles() {

}