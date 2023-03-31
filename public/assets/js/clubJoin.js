const submitBtn = document.getElementById('submit');
const modalMessage = document.getElementById('modal-message');
const clubsSelect = document.getElementById('clubs-select');

submitBtn.addEventListener('click', () => {
  const selectedOption = clubsSelect.options[clubsSelect.selectedIndex];
  modalMessage.textContent = selectedOption.value;
});
