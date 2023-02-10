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
const emailGroupChecks = document.getElementsByName('email-group'); // List of all email group checkboxes
const recipientsInput = document.getElementById('emailFormEmail'); // Email recipients input
let emailRecipientsArray = []; // Array of email recipients to compare with/


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
    emailRecipientsArray = []; emailRecipientsArray.contains()
})

// 'Add Email Recipients' Button Listener
document.getElementById('add-email-recipients').addEventListener('click', () => {
    for (let i = 0; i < emailGroupChecks.length; i++) {
        if (emailGroupChecks[i].checked && !containsRecipient(emailGroupChecks[i].value)) {
            recipientsInput.value += emailGroupChecks[i].value + '; ';
            emailRecipientsArray += emailGroupChecks[i].value;
        }
    }
});


// ~~~ Functions ~~~

// Checks if an email group is already listed inside the recipients input
function containsRecipient(groupName) {
    return emailRecipientsArray.includes(groupName)
}