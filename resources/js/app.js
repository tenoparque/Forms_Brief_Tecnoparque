import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.css';


// Define la función para mostrar una imagen de fondo aleatoria
function displayRandomBackgroundImage() {
    const images = [
        'images/fondoBrief4.jpg',
        'images/fondo2.jpg',
        'images/fondo3.jpg',
        // Agrega más rutas de imagen aquí
    ];

    const randomImage = images[Math.floor(Math.random() * images.length)];
    document.body.style.backgroundImage = `url(${randomImage})`;
    document.body.style.backgroundRepeat = 'repeat';
}

// Define la función que se ejecutará cuando el DOM esté completamente cargado
function initialize() {
    // Verifica si estamos en la vista de inicio de sesión
    if (window.location.pathname.includes('/login')) {
        displayRandomBackgroundImage(); // Muestra una imagen de fondo aleatoria inicialmente
        setInterval(displayRandomBackgroundImage, 1000); // Cambia la imagen de fondo cada segundo
    }
}

// Registra el evento DOMContentLoaded para ejecutar la función initialize cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', initialize);



$(document).ready(function() {
    $('.eye-icon').click(function() {
        const passwordInput = $('#password');
        const eyeIcon = $('.eye-icon i');

        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
        } else {
            passwordInput.attr('type', 'password');
            eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
        }
    });

    // Guarda el href del enlace en localStorage cuando se hace clic
    $(".sidebar-nav .sidebar-item .sidebar-link").click(function() {
        localStorage.setItem('activeLink', $(this).attr('href'));
    });

    // Obtiene el href del enlace activo de localStorage cuando la página se carga
    var activeLink = localStorage.getItem('activeLink');

    // Si hay un enlace activo guardado, agrega la clase 'active-link' al enlace activo
    if(activeLink) {
        $('a[href="' + activeLink + '"]').addClass('active-link');
    }
});



