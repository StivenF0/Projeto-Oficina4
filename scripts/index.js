const progressBar = document.getElementById('progressBar')
const value = document.getElementById('progressValue')
const elementCapacity = document.getElementById('totalCapacity')
const elementUtilCapacity = document.getElementById('utilizedCapacity')

let progressValueInitial = 0

async function getVolumeValue() {
    return await $.get('back/update-volume.php')
        .then((res) => parseInt(res))
}
    
// Buttons On and Off
function turnOn() {
    jQuery.post('back/write-data.php', {data: 1})
}

function turnOff() {
    jQuery.post('back/write-data.php', {data: 0})
}

main = async () => {

let waterVolume = await getVolumeValue() // Value in percent
let totalCapacity = 10 // Total capacity of the container in liters

// Initial interval, just to animate the initial value
const progressSpeed = 15 // Speed in ms
let initialValue = setInterval(() => {
    value.textContent = `${progressValueInitial}`
    progressBar.style.setProperty("--volume-percent", ` ${progressValueInitial}%`)

    if (progressValueInitial === waterVolume) {
        clearInterval(initialValue)
    } else if (progressValueInitial < waterVolume){
        progressValueInitial++
    } else {
        progressValueInitial--
    }
}, progressSpeed)

// Setting the values on the table
elementCapacity.textContent = `${totalCapacity} L`
elementUtilCapacity.textContent = `${totalCapacity * waterVolume / 100} L`
}

main()
const executeMain = setInterval(() => { main() }, 10000)
