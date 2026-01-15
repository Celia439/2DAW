//variables
let menu = document.getElementById("menu");
let infoP = document.getElementById("info");

//1. Asociar un click al contenedor #menu (delegación).
menu.addEventListener('click', function (event) {
    //2. Cambiar el fondo del botón pulsado (event.target) a verde y el
    // borde del contenedor (event.currentTarget) a negro.

    //4. Evitar que el borde del contenedor se aplique si se hace clic fuera de un botón.
    if (event.target.matches("button")) {

        // botón pulsado
        event.target.style.backgroundColor = "green";

        // contenedor
        event.currentTarget.style.border = "1px dashed black";

        //3. Mostrar en #info el texto del botón pulsado.
        infoP.innerText = "Has pulsado: " + event.target.innerText;
    }
});