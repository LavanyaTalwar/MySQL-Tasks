const firstNameInput = document.getElementById("fname");
const lastNameInput = document.getElementById("lname");
const fullNameInput = document.getElementById("fullname");
function updateFullName() {
    const firstName = firstNameInput.value;
    const lastName = lastNameInput.value;
    fullNameInput.value = firstName + " " + lastName;
    }
firstNameInput.addEventListener("input", updateFullName);
lastNameInput.addEventListener("input", updateFullName);