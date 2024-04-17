import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.css';





//  menu hamburguesa
const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});


// adaptar tamaño de imagen

window.onload = function() {
  var imagen = document.getElementById('logoHeader');

  if (imagen.naturalWidth < 800 || imagen.naturalHeight > 600) {
      imagen.style.maxWidth = '100%';
      imagen.style.maxHeight = '40%';
      imagen.style.objectFit = 'contain';
   } else {
      console.log('La imagen es más pequeña que las dimensiones especificadas.');
  }
}


// Define la función para mostrar una imagen de fondo aleatoria
// Definir una variable global para almacenar la última imagen utilizada
let lastImageIndex = -1;

// Función para mostrar una imagen de fondo aleatoria
function displayRandomBackgroundImage() {
    const images = [
        'images/fondoBrief4.jpg',
        'images/fondo2.jpg',
        'images/fondo3.jpg',
        // Agrega más rutas de imagen aquí
    ];

    // Seleccionar un índice aleatorio diferente al de la última imagen utilizada
    let randomImageIndex = Math.floor(Math.random() * images.length);
    while (randomImageIndex === lastImageIndex) {
        randomImageIndex = Math.floor(Math.random() * images.length);
    }

    // Guardar el índice de la imagen actual para la próxima vez
    lastImageIndex = randomImageIndex;

    // Obtener la ruta de la imagen aleatoria
    const randomImage = images[randomImageIndex];

    // Establecer la imagen de fondo y evitar que se repita
    document.body.style.backgroundImage = `url(${randomImage})`;
    document.body.style.backgroundRepeat = 'no-repeat';
    document.body.style.backgroundSize = 'cover'; // Ajustar tamaño de la imagen al contenedor
}


// Función para inicializar
function initialize() {
    // Verificar si estamos en la vista de inicio de sesión
    if (window.location.pathname.includes('/login')) {
        displayRandomBackgroundImage(); // Mostrar una imagen de fondo aleatoria inicialmente
        setInterval(displayRandomBackgroundImage, 5000); // Cambiar la imagen de fondo cada segundo
    }
}

// Llamar a la función de inicialización cuando el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', initialize);


// Registra el evento DOMContentLoaded para ejecutar la función initialize cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', initialize);





Swal.fire({
    title: '¡Éxito!',
    text: 'Operación realizada con éxito',
    icon: 'success',
}).then((result) => {
    // Recarga la página cuando la alerta se cierre
    if (result.isConfirmed) {
        location.reload();
    }
});

// Simulación del progreso
const steps = document.querySelectorAll('.step');
let currentStep = 0;

function updateProgress() {
  steps.forEach((step, index) => {
    if (index <= currentStep) {
      step.classList.add('active');
    } else {
      step.classList.remove('active');
    }
  });
}

// Ejemplo: Avanzar al siguiente paso
document.addEventListener('keydown', (event) => {
  if (event.key === 'ArrowRight') {
    currentStep = Math.min(currentStep + 1, steps.length - 1);
    updateProgress();
  } else if (event.key === 'ArrowLeft') {
    currentStep = Math.max(currentStep - 1, 0);
    updateProgress();
  }
});


    
    













