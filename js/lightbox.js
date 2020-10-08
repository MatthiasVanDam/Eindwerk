const lightbox = document.createElement('div')
const lightboxCont = document.createElement('div')
const lightboxClose = document.createElement('div')
const images = document.querySelectorAll('#realisatie-foto img')

lightbox.id = 'lightbox'
lightboxCont.id = 'lightboxCont'
lightboxClose.id = 'lightboxClose'


lightboxClose.className = 'fas fa-times fa-x7'

document.body.appendChild(lightbox)
lightbox.appendChild(lightboxCont)
lightbox.appendChild(lightboxClose)

images.forEach(image => {
    image.addEventListener('click', e => {
        lightbox.classList.add('active')
        const img = document.createElement('img')
        img.src = image.src

        while (lightboxCont.firstChild) {
            lightboxCont.removeChild(lightboxCont.firstChild)
        }
        lightboxCont.appendChild(img)
    })
})

lightboxClose.addEventListener('click', e => {
    lightbox.classList.remove('active')
})