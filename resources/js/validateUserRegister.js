alert("javascript tomadoxd");

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('form').addEventListener('submit', function (event) {
        var idNodoSelect = document.getElementById('id_nodo');
        var roleSelect = document.getElementById('role');

        // Si los selectores están en su valor por defecto, prevenimos el envío del formulario
        if (idNodoSelect.value === '' || roleSelect.value === '') {
            event.preventDefault();
            alert('Por favor, selecciona un nodo y un rol antes de enviar el formulario.');
        }
    });
});

