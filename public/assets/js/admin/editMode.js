const editSwitch = document.getElementById("editSwitch");
const parentElement = document.getElementById(document.currentScript.getAttribute('parent'));
const inputs = parentElement.querySelectorAll("input, textarea, button");

if (editSwitch !== null) {
  if (document.currentScript.getAttribute('isset')) {
    inputs.forEach((element) => {
      element.disabled = true;
    });
  }

  editSwitch.addEventListener("change", function () {
    inputs.forEach((element) => {
      element.disabled = !editSwitch.checked;
    });
  });
}
