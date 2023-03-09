// Variables
const submitButton = document.getElementById("form-submit");
const allChecks = document.querySelectorAll('input[type="checkbox"]');
const allUsersCheck = document.getElementById("all-users");
const allClubsCheck = document.getElementById("all-clubs");
const allProgramsCheck = document.getElementById("all-programs");

// ~~ Listeners ~~
// Form Submission Button
submitButton.addEventListener("click", () => {
  let recipientsJSON = {
    individual: [],
    general: [],
    club: [],
    team: [],
    committee: [],
    location: [],
    dev: [],
  };

  // Individuals
  const recipientsElement = document.getElementsByName("mailTo")[0].value;
  let recipientsString = removeAllSpaces(addMissingSemiColons(recipientsElement));
  const recipientsArray = recipientsString.split(";");

  recipientsArray.forEach((recipient) => {
    if (recipient !== '') {
      recipientsJSON.individual.push(recipient)
    }
  });

  // Groups
  for (let i = 0; i < allChecks.length; i++) {
    if (allChecks[i].checked) {
      let group = allChecks[i].dataset.groupName;
      let id = allChecks[i].value;

      switch (group) {
        case "general":
          recipientsJSON.general.push(id);
          break;
        case "club":
          recipientsJSON.club.push(id);
          break;
        case "team":
          recipientsJSON.team.push(id);
          break;
        case "committee":
          recipientsJSON.committee.push(id);
          break;
        case "location":
          recipientsJSON.location.push(id);
          break;
        case "dev":
          recipientsJSON.dev.push(id);
          break;
      }
    }
  }

  document.getElementsByName("groups")[0].value = JSON.stringify(recipientsJSON);
  submitButton.submit();
});

allUsersCheck.addEventListener("click", () => {
  // Checked
  if (allUsersCheck.checked) {
    for (let i = 0; i < allChecks.length; i++) {
      if (allChecks[i] !== allUsersCheck) {
        allChecks[i].checked = false;
        allChecks[i].disabled = true;
      }
    }
  }

  //Unchecked
  else {
    for (let i = 0; i < allChecks.length; i++) {
      if (allChecks[i] !== allUsersCheck) {
        allChecks[i].disabled = false;
      }
    }
  }
});

allClubsCheck.addEventListener("click", () => {
  // Checked
  if (allClubsCheck.checked) {
    for (let i = 0; i < allChecks.length; i++) {
      if (
        allChecks[i].dataset.groupName === "club" ||
        allChecks[i].dataset.groupName === "team"
      ) {
        allChecks[i].checked = false;
        allChecks[i].disabled = true;
      }
    }
  }

  //Unchecked
  else {
    for (let i = 0; i < allChecks.length; i++) {
      if (
        allChecks[i].dataset.groupName === "club" ||
        allChecks[i].dataset.groupName === "team"
      ) {
        allChecks[i].disabled = false;
      }
    }
  }
});

allProgramsCheck.addEventListener("click", () => {
  // Checked
  if (allProgramsCheck.checked) {
    for (let i = 0; i < allChecks.length; i++) {
      if (allChecks[i].dataset.groupName === "dev") {
        allChecks[i].checked = false;
        allChecks[i].disabled = true;
      }
    }
  }

  //Unchecked
  else {
    for (let i = 0; i < allChecks.length; i++) {
      if (allChecks[i].dataset.groupName === "dev") {
        allChecks[i].disabled = false;
      }
    }
  }
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
