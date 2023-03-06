document.getElementById('form-submit').addEventListener('click', () => {
    const recipientsInput = document.getElementsByName('mailTo')[0].value
    let recipients = addMissingSemiColons(recipientsInput)
    recipients = removeAllSpaces(recipients)

    // Creating JSON of email recipients
    const recipientsArray = recipients.split(';')
    let recipientsJSON = { 'recipients': [] }
    recipientsArray.forEach(recipient => recipientsJSON.recipients.push(recipient))
    document.getElementsByName('groups')[0].value = JSON.stringify(recipientsJSON)

    document.getElementById('send-email-form').submit()
})

function addMissingSemiColons(string) {
    string = string.replaceAll(/\s+/g,'\ ') // Removing all but one space between emails
    if (string.match(/[^\s;]\s+[^\s;]/gi)) string = string.replaceAll(/\s+/g, ';') // Replacing spaces with semicolons
    return string
}

function removeAllSpaces(string) {
    return string.replaceAll(/\s/g,'')
}