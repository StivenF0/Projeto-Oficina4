const inputName = document.getElementById('profile-name')
const inputPassword = document.getElementById('password')
const inputEmail = document.getElementById('profile-email')
const emailLabel = document.getElementById('emailLabel')
const selectElement = document.getElementById("idSel")
const submitButton = document.getElementById('subBtn')

inputName.addEventListener('input', validateForm)
inputPassword.addEventListener('input', validateForm)
inputEmail.addEventListener('input', validateForm)
inputEmail.addEventListener('input', validateEmail)
selectElement.addEventListener('change', validateForm)

function validateForm() {
    const selectedOption = selectElement.options[selectElement.selectedIndex].value
    if (inputName.value.length > 0 && inputPassword.value.length > 0 && selectedOption != "default" && emailRegExIsValid(inputEmail.value)) {
        submitButton.disabled = false
        submitButton.style.background = "#1e90ff"
        submitButton.style.color = "#fff"
        submitButton.style.cursor = "pointer"

        submitButton.onmouseenter = () => submitButton.style.background = "#66b3ff"
        submitButton.onmouseleave = () => submitButton.style.background = "#1e90ff"
    } else {
        submitButton.disabled = true
        submitButton.style.background = "#a3d1ff"
        submitButton.style.color = "cornflowerblue"
        submitButton.style.cursor = "default"
    }
}

function emailRegExIsValid(emailToCheck) {
    let emailRegEx = /^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+[.]+[c]+[o]+[m]$/;
    return emailRegEx.test(emailToCheck)
}

function validateEmail() {
    if (emailRegExIsValid(inputEmail.value)) {
        inputEmail.style.borderBottom = "2px solid #1e90ff"
        emailLabel.style.color = "#1e90ff"
    } else {
        inputEmail.style.borderBottom = "2px solid #f11515"
        emailLabel.style.color = "#f11515"
    }
}
