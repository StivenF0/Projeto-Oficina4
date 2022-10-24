function startModal(modalId) {
    const modal = document.getElementById(modalId)
    if (modal) {
        modal.classList.add('show')
        modal.addEventListener('click', (event) => {
            if (event.target.id == modalId) {
                modal.classList.remove('show')
        }
    })
    }
}

window.addEventListener('load', () => startModal('div-outside'))

startModal('div-outside')
