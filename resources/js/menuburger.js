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