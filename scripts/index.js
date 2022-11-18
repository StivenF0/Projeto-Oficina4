// Chart
const progressBar = document.getElementById('progressBar')
const value = document.getElementById('progressValue')
const elementCapacity = document.getElementById('totalCapacity')
const elementUtilCapacity = document.getElementById('utilizedCapacity')
const refreshingDiv = document.getElementById('div-refresh')

let number;
let oldNumber = 0;
const progressSpeed = 1 //Speed in ms
$(document).ready(function(){
    $('#div-refresh').load('back/update-volume.php');
    $('#div-refresh').load('back/update-volume.php');
    setInterval(function() {
        $('#div-refresh').load('back/update-volume.php');
        number = $('#div-refresh').html();
        let progressValue = 0
        let progressValueEnd = Number(number) //Value in percent
        let totalCapacity = 10 //Total capacity of the container in liters

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
    }, 1000);
})

// Buttons On and Off
function turnOn() {
    jQuery.post('back/write-data.php', {data: 1})
}

function turnOff() {
    jQuery.post('back/write-data.php', {data: 0})
}

