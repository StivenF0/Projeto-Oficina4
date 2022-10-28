const progressBar = document.getElementById('progressBar')
const value = document.getElementById('progressValue')
const elementCapacity = document.getElementById('totalCapacity')
const elementUtilCapacity = document.getElementById('utilizedCapacity')

const progressSpeed = 15 //Speed in ms
let progressValue = 0
let progressValueEnd = 100 //Value in percent
let totalCapacity = 6000 //Total capacity of the container in liters

progress = setInterval(() => {
    value.textContent = `${progressValue}`
    progressBar.style.setProperty("--volume-percent", ` ${progressValue}%`)
    if (progressValue === progressValueEnd) {
        clearInterval(progress)
    } else {
        progressValue++
    }
}, progressSpeed)

elementCapacity.textContent = `${totalCapacity} L`
elementUtilCapacity.textContent = `${totalCapacity * progressValueEnd / 100} L`
