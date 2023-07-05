// Variables
const emailForm = document.getElementById("send-email-form")
const submitButton = document.getElementById("form-submit")
const allChecks = document.querySelectorAll('input[type="checkbox"]')
const allUsersCheck = document.getElementById("all-users")
const allClubsCheck = document.getElementById("all-clubs")
const allProgramsCheck = document.getElementById("all-programs")
const teamCheckboxes = document.querySelectorAll(
    'input[data-group-name="team"]'
)
const clubsCheckboxes = document.querySelectorAll(
    'input[data-group-name="club"]'
)
const committeesCheckboxes = document.querySelectorAll(
    'input[data-group-name="committee"]'
)
const locationsCheckboxes = document.querySelectorAll(
    'input[data-group-name="location"]'
)
const devsCheckboxes = document.querySelectorAll('input[data-group-name="dev"]')
const emailGroup = document.getElementById("groupEmail")
const recipientEmailInput = document.getElementsByName("mailTo")[0]

// ~~ Listeners ~~
submitButton.addEventListener("click", () => {
    let recipientsJSON = {
        recipients: [],
        general: [],
        club: [],
        team: [],
        committee: [],
        location: [],
        dev: [],
    }

    // Individuals
    const recipientsElement = recipientEmailInput.value
    let recipientsString = removeAllSpaces(
        addMissingSemiColons(recipientsElement)
    )
    const recipientsArray = recipientsString.split(";")

    recipientsArray.forEach((recipient) => {
        if (recipient !== "") {
            recipientsJSON.recipients.push(recipient)
        }
    })

    // Groups
    for (let i = 0; i < allChecks.length; i++) {
        if (allChecks[i].checked) {
            let group = allChecks[i].dataset.groupName
            let id = allChecks[i].value
            checkedEmail = allChecks[i].value

            switch (group) {
                case "general":
                    recipientsJSON.general.push(id)
                    break
                case "club":
                    recipientsJSON.club.push(id)
                    break
                case "team":
                    recipientsJSON.team.push(id)
                    break
                case "committee":
                    recipientsJSON.committee.push(id)
                    break
                case "location":
                    recipientsJSON.location.push(id)
                    break
                case "dev":
                    recipientsJSON.dev.push(id)
                    break
            }
        }
    }

    document.getElementsByName("groups")[0].value = JSON.stringify(recipientsJSON)
    emailForm.submit()
})

allUsersCheck.addEventListener("click", () => {
    // Checked
    if (allUsersCheck.checked) {
        checkedEmail = allUsersCheck.value
        console.log(checkedEmail)
        for (let i = 0; i < allChecks.length; i++) {
            if (allChecks[i] !== allUsersCheck) {
                allChecks[i].checked = false
                allChecks[i].disabled = true
            }
        }
    } else {
        checkedEmail = ""
        for (let i = 0; i < allChecks.length; i++) {
            if (allChecks[i] !== allUsersCheck) {
                allChecks[i].disabled = false
            }
        }
    }

    updateSelectedCheckboxes()
})

allClubsCheck.addEventListener("click", () => {
    // Checked
    if (allClubsCheck.checked) {
        checkedEmail = allClubsCheck.value
        console.log(checkedEmail)
        for (let i = 0; i < allChecks.length; i++) {
            if (
                allChecks[i].dataset.groupName === "club" ||
                allChecks[i].dataset.groupName === "team"
            ) {
                allChecks[i].checked = false
                allChecks[i].disabled = true
            }
        }
    }
    //unchecked
    else {
        checkedEmail = ""
        for (let i = 0; i < allChecks.length; i++) {
            if (
                allChecks[i].dataset.groupName === "club" ||
                allChecks[i].dataset.groupName === "team"
            ) {
                allChecks[i].disabled = false
            }
        }
    }

    updateSelectedCheckboxes()
})

allProgramsCheck.addEventListener("click", () => {
    // Checked
    if (allProgramsCheck.checked) {
        checkedEmail = allProgramsCheck.value
        console.log(checkedEmail)
        for (let i = 0; i < allChecks.length; i++) {
            if (allChecks[i].dataset.groupName === "dev") {
                allChecks[i].checked = false
                allChecks[i].disabled = true
            }
        }
    } else {
        checkedEmail = ""
        for (let i = 0; i < allChecks.length; i++) {
            if (allChecks[i].dataset.groupName === "dev") {
                allChecks[i].disabled = false
            }
        }
    }

    updateSelectedCheckboxes()
})

teamCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("click", updateSelectedCheckboxes)
})

clubsCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("click", updateSelectedCheckboxes)
})

committeesCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("click", updateSelectedCheckboxes)
})

locationsCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("click", updateSelectedCheckboxes)
})

devsCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("click", updateSelectedCheckboxes)
})

// Functions
function addMissingSemiColons(string) {
    string = string.replaceAll(/\s+/g, ";") // Replacing multiple spaces with a semicolon
    string = string.replaceAll(/^;/, "") // Remove leading semicolon, if any
    string = string.replaceAll(/;{2,}/g, ";") // Replace consecutive semicolons with a single semicolon
    return string
}

function removeAllSpaces(string) {
    return string.replaceAll(/\s/g, " ")
}

function updateSelectedCheckboxes() {
    const selectedCheckboxes = Array.from(allChecks)
        .filter((checkbox) => checkbox.checked)
        .map((checkbox) => {
            if (checkbox === allUsersCheck) {
                return checkbox.nextElementSibling.textContent
            } else {
                const label = document.querySelector(`label[for="${checkbox.id}"]`)
                return label.textContent
            }
        })
        .join("; ")



    if (selectedCheckboxes) {
        emailGroup.style.display = "block"
        emailGroup.innerHTML = "Checked Emails: " + selectedCheckboxes
    } else {
        emailGroup.style.display = "none"
    }
}