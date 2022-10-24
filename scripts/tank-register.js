const inputNumber = document.getElementById('idNumber')
const inputCapacity = document.getElementById('idCapacity')
const inputDimensions1 = document.getElementById('idDimensions1')
const inputDimensions2 = document.getElementById('idDimensions2')
const dimensionsLabel = document.getElementById('dimensionsLabel')
const tankShape = document.getElementById('idShape')
const opts = document.getElementById('opts')
const op1 = document.getElementById('opt1')
const op2 = document.getElementById('opt2')
const selectElement = document.getElementById("idSel")
const submitButton = document.getElementById('subBtn')

inputCapacity.addEventListener('input', validateForm)
inputNumber.addEventListener('input', validateForm)
tankShape.addEventListener('change', openDimensions)
inputDimensions1.addEventListener('input', validateForm)
inputDimensions1.addEventListener('input', validateDimension)
inputDimensions2.addEventListener('input', validateForm)
inputDimensions2.addEventListener('input', validateDimension)
selectElement.addEventListener('change', validateForm)

let shapes = [inputDimensions1, inputDimensions2]

function validateForm() {
    const selectedOption = selectElement.options[selectElement.selectedIndex].value
    if (inputNumber.value.length > 0 && inputCapacity.value.length > 0 && selectedOption != "default" && (dimensionRegExIsValid(shapes[checkShape() - 1].value, checkShape()))) {
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

function dimensionRegExIsValid(dimension, shape) {
    if (shape == 1) {
        var dimensionRegEx = /[\d]{1,3}[x][\d]{1,3}[x][\d]{1,3}/;
    } else if (shape == 2) {
        var dimensionRegEx = /[\d]{1,3}[x][\d]{1,3}/;
    }
    
    return dimensionRegEx.test(dimension)
}

function validateDimension() {
    if (dimensionRegExIsValid(shapes[checkShape() - 1].value, checkShape())) {
        shapes[checkShape() - 1].style.borderBottom = "2px solid #1e90ff"
        dimensionsLabel.style.color = "#1e90ff"
    } else {
        shapes[checkShape() - 1].style.borderBottom = "2px solid #f11515"
        dimensionsLabel.style.color = "#f11515"
    }
}

function openDimensions() {
    submitButton.disabled = true
    submitButton.style.background = "#a3d1ff"
    submitButton.style.color = "cornflowerblue"
    submitButton.style.cursor = "default"

    const selectedOpt = tankShape.options[tankShape.selectedIndex].value
    if (selectedOpt == 1) {
        opts.style.display = "block"
        op1.style.display = "block"
        jQuery('#idDimensions2').val("")
        op2.style.display = "none"
    } else if (selectedOpt == 2) {
        opts.style.display = "block"
        jQuery('#idDimensions1').val("")
        op1.style.display = "none"
        op2.style.display = "block"
    }

    validateDimension()
}

function checkShape() {
    if (op1.style.display == "block" && op2.style.display == "none") {
        return 1
    } else if (op1.style.display == "none" && op2.style.display == "block") {
        return 2
    }
}
