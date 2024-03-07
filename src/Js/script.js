// Opcional: detener el carrusel al interactuar con él (cambiar la página)
document.querySelector('.carousel-container').addEventListener('mouseenter', () => {
    document.querySelector('.carousel-container').style.animationPlayState = 'paused';
});

document.querySelector('.carousel-container').addEventListener('mouseleave', () => {
    document.querySelector('.carousel-container').style.animationPlayState = 'running';
});
