// Setting email input data in session data (For when a user is returning from editing email groups)
document.getElementById('emailFormTitle').value = sessionStorage.getItem('emailSubject')
document.getElementById('emailFormFullName').value = sessionStorage.getItem('emailName')
document.getElementById('emailFormEmail').value = sessionStorage.getItem('emailRecipients')
document.getElementById('emailFormTextBox').innerText = sessionStorage.getItem('emailBody')

// Resetting session variables
sessionStorage.removeItem('emailSubject')
sessionStorage.removeItem('emailName')
sessionStorage.removeItem('emailRecipients')
sessionStorage.removeItem('emailBody')

// Listener for 'Edit Email Groups' button
document.getElementById('edit-email-group-btn').addEventListener('click', () => {
    // Retrieving email data
    let emailSubject = document.getElementById('emailFormTitle').value
    let emailName = document.getElementById('emailFormFullName').value
    let emailRecipients = document.getElementById('emailFormEmail').value
    let emailBody = document.getElementById('emailFormTextBox').value

    // Setting data inside session data
    sessionStorage.setItem('emailSubject', emailSubject)
    sessionStorage.setItem('emailName', emailName)
    sessionStorage.setItem('emailRecipients', emailRecipients)
    sessionStorage.setItem('emailBody', emailBody)

    window.location.href = 'editEmailGroups.php';
})