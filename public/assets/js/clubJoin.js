// Variables
const submitBtn = document.getElementById('submit');
const modalMessage = document.getElementById('modal-message');
const clubsSelect = document.getElementById('clubs-select');

const submitButton = document.getElementById("submit");
const selectDropdown = document.getElementById("clubs-select");


// Listeners
submitBtn.addEventListener('click', () => {
  const selectedOption = clubsSelect.options[clubsSelect.selectedIndex];
  modalMessage.textContent = selectedOption.value;
});

selectDropdown.addEventListener("change", function() {
    submitButton.disabled = selectDropdown.value === "0";
});


// Main
submitButton.disabled = true;