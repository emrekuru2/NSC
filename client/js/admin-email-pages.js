// Setting email input data in session data (For when a user is returning from editing email groups)
document.getElementById('emailFormTitle').value = sessionStorage.getItem('emailSubject');
document.getElementById('emailFormFullName').value = sessionStorage.getItem('emailName');
document.getElementById('emailFormEmail').value = sessionStorage.getItem('emailRecipients');
document.getElementById('emailFormTextBox').innerText = sessionStorage.getItem('emailBody');

// Resetting session variables
sessionStorage.removeItem('emailSubject');
sessionStorage.removeItem('emailName');
sessionStorage.removeItem('emailRecipients');
sessionStorage.removeItem('emailBody');


// ~~~ Variables ~~~
const emailGroupChecks = document.getElementsByName('email-group'); // All email group checkboxes
const recipientsInput = document.getElementById('emailFormEmail'); // Email recipients input
const emailGroupsClosed = document.getElementById('email-group-lists-closed'); // Email groups menu closed
const emailGroupsOpened = document.getElementById('email-group-lists-opened'); // Email groups menu opened
let emailGroupsArray = []; // Array of email group recipients to compare with


// ~~~ Listeners ~~~

// 'Edit Email Groups' Button Listener
document.getElementById('edit-email-group-btn').addEventListener('click', () => {
    // Retrieving email data
    let emailSubject = document.getElementById('emailFormTitle').value;
    let emailName = document.getElementById('emailFormFullName').value;
    let emailRecipients = document.getElementById('emailFormEmail').value;
    let emailBody = document.getElementById('emailFormTextBox').value;

    // Setting data inside session data
    sessionStorage.setItem('emailSubject', emailSubject);
    sessionStorage.setItem('emailName', emailName);
    sessionStorage.setItem('emailRecipients', emailRecipients);
    sessionStorage.setItem('emailBody', emailBody);

    window.location.href = 'editEmailGroups.php';
});

// 'Clear Email Recipients' Button Listener
document.getElementById('clear-all-recipients-btn').addEventListener('click', () => {
    recipientsInput.value = '';
    emailGroupsArray = [];
})

// 'Add Email Recipients' Button Listener
document.getElementById('add-email-recipients').addEventListener('click', () => {
    for (let i = 0; i < emailGroupChecks.length; i++) {
        // If the recipient is not checked already
        if (emailGroupChecks[i].checked && !containsRecipient(emailGroupChecks[i].value)) {
            recipientsInput.value += emailGroupChecks[i].value + ';\ ';
            emailGroupsArray += emailGroupChecks[i].value;
        }
    }
});

// 'Open Email List' Button
document.getElementById('email-group-lists-open-btn').addEventListener('click', clickEmailGroupsButton)

// 'Close Email List' Button
document.getElementById('email-group-lists-close-btn').addEventListener('click', clickEmailGroupsButton)

// 'Send Email' Button
document.getElementById('submitEmail').addEventListener('click', clickSendEmail)

// ~~~ Functions ~~~

// Checks if an email group is already listed inside the recipients input
function containsRecipient(groupName) {
    return emailGroupsArray.includes(groupName)
}

// Opens/closes the email groups list
function clickEmailGroupsButton() {
    // Currently Opened
    if (isEmailGroupListOpen()) {
        emailGroupsOpened.classList.replace('active','inactive');
        emailGroupsClosed.classList.replace('inactive', 'active');
    }

    // Currently Closed
    else {
        emailGroupsOpened.classList.replace('inactive','active');
        emailGroupsClosed.classList.replace('active', 'inactive');
    }
}

// Checks if the email groups list is open
function isEmailGroupListOpen() {
    return emailGroupsOpened.classList.contains('active')
}

// Creates JSON of all recipients and submits email form
function clickSendEmail() {
    let recipientsJSON = {
        "individualEmails": [],
        "emailGroups": []
    }

    // Removing spaces
    let recipients = recipientsInput.value;
    recipients = recipients.replaceAll(/\s/g,'');

    // Adding recipient emails and groups to JSON
    const recipientsArray = recipients.split(';');
    for (let i = 0; i < recipientsArray.length; i++) {
        // Group Email
        if (containsEmailGroupKeyword(recipientsArray[i])) {
            recipientsJSON.emailGroups.push(recipientsArray[i]);
        }

        // Individual Email
        else {
            recipientsJSON.individualEmails.push(recipientsArray[i]);
        }
    }

    // Setting value of hidden value input
    document.getElementById('email-recipient-json').value = JSON.stringify(recipientsJSON);

    // Submitting 'Send Email' form
    document.getElementById('send-email-form').submit();
}

// Checks if string contains any email group keywords
const emailGroupKeywords = [ 'all_', 'club_', 'committee_', 'region_' ]
function containsEmailGroupKeyword(string) {
    for (let i = 0; i < emailGroupKeywords.length; i++) {
        if (string.includes(emailGroupKeywords[i])) {
            return true;
        }
    }
    return false;
}


















