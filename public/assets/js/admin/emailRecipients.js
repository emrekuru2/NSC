// Listeners
document.getElementById("form-submit").addEventListener("click", () => {
  let recipientsJSON = {
    recipients: [],
    groups: [],
  };

  // Individuals
  const recipientsElement = document.getElementsByName("mailTo")[0].value;
  let recipientsString = removeAllSpaces(addMissingSemiColons(recipientsElement));
  const recipientsArray = recipientsString.split(";");

  recipientsArray.forEach((recipient) =>
    recipientsJSON.recipients.push(recipient)
  );

  // Groups
  const emailGroupChecks = document.querySelectorAll('input[type="checkbox"]');
  emailGroupChecks.forEach((checkbox) => {
      if (checkbox.checked) {
        recipientsJSON.groups.push(checkbox.value)
      }
  });

  document.getElementsByName("groups")[0].value = JSON.stringify(recipientsJSON);
  document.getElementById("send-email-form").submit();
});

// Functions
function addMissingSemiColons(string) {
  string = string.replaceAll(/\s+/g, " "); // Removing all but one space between emails
  if (string.match(/[^\s;]\s+[^\s;]/gi))
    string = string.replaceAll(/\s+/g, ";"); // Replacing spaces with semicolons
  return string;
}

function removeAllSpaces(string) {
  return string.replaceAll(/\s/g, "");
}
