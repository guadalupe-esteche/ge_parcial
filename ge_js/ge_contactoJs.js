$(document).ready(function() {
    // Alternar entre formularios con deslizamiento
    $("#show-registro").click(function(event) {
        event.preventDefault();  
        $("#login-form").slideUp();  
        $("#registro-form").slideDown();  
    });

    $("#show-login").click(function(event) {
        event.preventDefault();  
        $("#registro-form").slideUp();  
        $("#login-form").slideDown();  
    });

     // Verificar si la contraseña cumple con los requisitos
     if (!regex.test(password)) {
        event.preventDefault();  // Evitar el envío del formulario si no es válido
        $("#error-mensaje").show();  
    } else {
        $("#error-mensaje").hide();  
        alert("Formulario enviado correctamente.");  // Alertar que el formulario se ha enviado
        // Aquí podrías realizar alguna otra acción, como redirigir o limpiar el formulario si lo deseas
    }
});