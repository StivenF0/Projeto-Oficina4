const passwordInput = document.querySelector("#password")
const passwordToggle = document.querySelector("#passToggle")

function passToggle() {
    if (this.checked) {
        passwordInput.type = "text"
    } else {
        passwordInput.type = "password"
    }
}

passwordToggle.addEventListener("click", passToggle)