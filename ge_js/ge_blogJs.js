
// Selecciona el encabezado que al hacer clic desplegará/ocultará el texto
const toggle = document.querySelector('.toggle');
const respuesta = document.querySelector('.respuesta');

// Agrega un evento de clic al encabezado
toggle.addEventListener('click', function () {
    // Cambia la visibilidad del texto de respuesta
    if (respuesta.style.display === 'none' || respuesta.style.display === '') {
        respuesta.style.display = 'block'; // Muestra la respuesta
    } else {
        respuesta.style.display = 'none'; // Oculta la respuesta
    }
});

