const progressBar = document.getElementById('progressBar')
const value = document.getElementById('progressValue')
const elementCapacity = document.getElementById('totalCapacity')
const elementUtilCapacity = document.getElementById('utilizedCapacity')

let number;
let oldNumber = 0;
const progressSpeed = 15 // Speed in ms

setInterval(() => {
    jQuery.post('back/update-volume.php', function(data) {
        number = data
        console.log(number)
    })

    let progressValue = 0
    let progressValueEnd = Number(number) //Value in percent
    let totalCapacity = 6000 //Total capacity of the container in liters

    if (number != oldNumber) {
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
        oldNumber = number
    }
}, "1000")
