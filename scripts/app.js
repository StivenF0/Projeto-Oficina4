progressBar = document.getElementById('progressBar')
value = document.getElementById('progressValue')

const progressSpeed = 15; //Speed in ms
let progressValue = 0;
let progressValueEnd = 30; //Value in percent

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

obj = document.querySelector('main > div:nth-child(2)')
console.log(obj)