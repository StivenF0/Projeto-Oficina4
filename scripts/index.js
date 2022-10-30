// Chart
const progressBar = document.getElementById('progressBar')
const value = document.getElementById('progressValue')
const elementCapacity = document.getElementById('totalCapacity')
const elementUtilCapacity = document.getElementById('utilizedCapacity')

const progressSpeed = 15 //Speed in ms
let progressValue = 0
let progressValueEnd = 30 //Value in percent
let totalCapacity = 6000 //Total capacity of the container in liters

progress = setInterval(() => {
    value.textContent = `${progressValue}`
    progressBar.style.background = `conic-gradient(
        var(--primary-color) ${progressValue * 3.6}deg,
        var(--secondary-color) ${progressValue * 3.6}deg
    )`
    if (progressValue === progressValueEnd) {
        clearInterval(progress)
    } else {
        progressValue++
    }
}, progressSpeed)

elementCapacity.textContent = `${totalCapacity} L`
elementUtilCapacity.textContent = `${totalCapacity * progressValueEnd / 100} L`

// Buttons On and Off
function turnOn() {
    jQuery.post('back/write-data.php', {data: 1})
}

function turnOff() {
    jQuery.post('back/write-data.php', {data: 0})
}
