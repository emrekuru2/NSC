// let checkbox = document.getElementById('flexCheckDefault');
// let endyear = document.getElementById('endyear');

// checkbox.addEventListener('click', (event) => {
//     let button = event.target;
//     if (button.checked) {
//         endyear.disabled = true;
//         endyear.value = '';
//     } else {
//         endyear.disabled = false;
//     }
// });

// function showDeleteMessage() {
//     alert('Committee deleted successfully.');
// }

// function populateEditForm(id, name, startyear, endyear, description) {
//     // Populate the form fields with the committee data
//     document.getElementById('id').value = id;
//     document.getElementById('name').value = name;
//     document.getElementById('startyear').value = startyear;
//     document.getElementById('endyear').value = endyear;
//     document.getElementById('description').value = description;

//     // If "endyear" is empty, set the checkbox to "Present"
//     if (!endyear) {
//         document.getElementById('flexCheckDefault').checked = true;
//         document.getElementById('endyear').disabled = true;
//     } else {
//         document.getElementById('flexCheckDefault').checked = false;
//         document.getElementById('endyear').disabled = false;
//     }

//     // Switch to the save form
//     toggleForms();
// }

// function toggleForms() {
//     const createForm = document.getElementById('createForm');
//     const saveForm = document.getElementById('saveForm');

//     if (createForm.style.display === 'none') {
//         createForm.style.display = 'block';
//         saveForm.style.display = 'none';
//     } else {
//         createForm.style.display = 'none';
//         saveForm.style.display = 'block';
//     }
// }

// Add event listener for the save button
// const saveButton = document.querySelector('#saveForm button[type="submit"]');
// saveButton.addEventListener('click', () => {
//     // Optionally, you can show a success message after saving
//     alert('Committee data saved successfully.');
// });

// new MultiSelectTag('days[]'); // id
