const submitBtn = document.getElementById('submit');
const modalMessage = document.getElementById('modal-message');
const clubsSelect = document.getElementById('clubs-select');

submitBtn.addEventListener('click', () => {
  const selectedOption = clubsSelect.options[clubsSelect.selectedIndex];
  modalMessage.textContent = selectedOption.value;
});



const submitButton = document.getElementById("submit");
const selectDropdown = document.getElementById("clubs-select");

// Disable submit button by default
submitButton.disabled = true;

// Listen for changes on the dropdown
selectDropdown.addEventListener("change", function() {
    // If a value is selected, enable the submit button
    if (selectDropdown.value !== "0") {
        submitButton.disabled = false;
    } else {
        // Otherwise, disable the submit button
        submitButton.disabled = true;
    }
});

