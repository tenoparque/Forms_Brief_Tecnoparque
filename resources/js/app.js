import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.css';


const images = [
    'images/fondoBrief4.jpg',
    'images/fondo2.jpg',
    'images/fondo3.jpg',
    // Agrega más rutas de imagen aquí
];

function displayRandomBackgroundImage() {
    const randomImage = images[Math.floor(Math.random() * images.length)];
    document.body.style.backgroundImage = `url(${randomImage})`;
    document.body.style.backgroundRepeat = 'repeat';
}

// Verifica si estamos en la vista de inicio de sesión (por ejemplo, la URL contiene "/login")
if (window.location.pathname.includes('/login')) {
    displayRandomBackgroundImage(); // Mostrar una imagen de fondo aleatoria inicialmente
    setInterval(displayRandomBackgroundImage, 1000);
}


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
});
 /*color del sidebar al hacer click sobre una opcion*/ 

$(".sidebar-nav .sidebar-item .sidebar-link").click(function() {
    // Guarda el href del enlace en localStorage
    localStorage.setItem('activeLink', $(this).attr('href'));
});

// Cuando la página se carga
$(document).ready(function() {
    // Obtiene el href del enlace activo de localStorage
    var activeLink = localStorage.getItem('activeLink');

    // Si hay un enlace activo guardado
    if(activeLink) {
        // Agrega la clase 'active-link' al enlace activo
        $('a[href="' + activeLink + '"]').addClass('active-link');
    }
});


