/**
 * Esta función valida los campos de un formulario
 * mediante expresiones regulares.
 */
function validarFormulario() {
    // Variable de mensaje 
    let msg = document.getElementById("msg");
    msg.innerHTML = "";

    // 1) Nombre.
    // nombre no puede estar vacío.
    let letraEspacio = /^[A-Za-zÑñ ]+$/;
    if (document.getElementById("nombre").value == "") {
        msg.innerHTML = "El nombre no puede estar vacío." + document.getElementById("nombre").value;
        // solo puede contener letras y espacios.
    } else if (!letraEspacio.test(document.getElementById("nombre").value)) {
        msg.innerHTML = "El nombre solo puede contener letras o espacios. " + document.getElementById("nombre").value;

        // 2) Apellidos.
        // No puede estar vacío.
    } else if (document.getElementById("apellidos").value == "") {
        msg.innerHTML = "El apellido no puede estar vacío.";
        // solo letras y espacios.
    } else if (!letraEspacio.test(document.getElementById("apellidos").value)) {
        msg.innerHTML = "El apellido solo puede contener letras o espacios.";

        // 3) Email
        // no puede estar vacío
    } else if (document.getElementById("email").value == "") {
        msg.innerHTML = "El email no puede estar vacío.";
        // debe coincidir con el formato email: nombre@dominio.extension
    } else if (!/^[a-zA-ZÑñ]+@[a-zA-ZÑñ]+\.[a-zA-ZÑñ]+$/.test(document.getElementById("email").value)) {
        msg.innerHTML = "El email no tiene el formato correcto, ej.: correo@gmail.com";

        // 4) Contraseña
        // no puede estar vacía 
    } else if (document.getElementById("password").value == "") {
        msg.innerHTML = "La contraseña no puede estar vacía.";
        // Mínimo 8 caracteres
    } else if (document.getElementById("password").value.length < 8) {
        msg.innerHTML = "La contraseña debe tener mínimo 8 caracteres.";
        // debe contener al menos una letra y un número.
    } else if (!/^[a-zA-ZÑñ]+[0-9]+$/.test(document.getElementById("password").value)) {
        msg.innerHTML = "La contraseña debe tener mínimo una letra y un número.";

        // 5) Edad
        // no puede estar vacía 
    } else if (document.getElementById("edad").value == "") {
        msg.innerHTML = "La edad no puede estar vacía.";
        // debe ser numérica
    } else if (isNaN(Number(document.getElementById("edad").value))) {
        msg.innerHTML = "La edad debe ser numérica.";
        // debe estar entre 18 y 99
    } else if (document.getElementById("edad").value < 18 || document.getElementById("edad").value > 99) {
        msg.innerHTML = "La edad mínima es 18 y la máxima 99";
    } else {
        msg.innerHTML = "Todo bien o(￣▽￣)ｄ";
    }
}
