const images = [
    'images/fondoBrief4.jpg',
    'images/fondo2.jpg',
    'images/fondo3.jpg',
    
    // Agregue más rutas de imagen aquí
];

function displayRandomBackgroundImage() {
    const randomImage = images[Math.floor(Math.random() * images.length)];
    document.body.style.backgroundImage = `url(${randomImage})`;
    document.body.style.backgroundRepeat = 'repeat';
}

displayRandomBackgroundImage(); // Mostrar una imagen de fondo aleatoria inicialmente
setInterval(displayRandomBackgroundImage, 1000); // Cambiar la imagen de fondo aleatoriamente cada 20 segundos