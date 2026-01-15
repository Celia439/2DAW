//variables
let targetas = document.getElementById("tarjetas");
let targeta = document.getElementsByClassName("tarjeta");
//1. Usar un único addEventListener en #tarjetas.
targetas.addEventListener('click', function (event) {
    //2. Comprobar con matches que solo actúe si se pulsa un botón.
    if (event.target.matches("button")) {
        //3. Resaltar la tarjeta del botón pulsado (closest) cambiando su fondo
        //  a amarillo.
        event.target.closest(".tarjeta").style.background = "yellow";
    }


});
//4. Añadir un botón dinámico que cree nuevas tarjetas y ver que la
// delegación funciona también para ellas.
let botonDin = document.createElement("button");
botonDin.innerText = "Añadir Tarjeta Nueva";
document.body.appendChild(botonDin);

let btnD = document.getElementById("btnD");
botonDin.addEventListener("click", function() {
    let nuevaTarjeta = document.createElement("div");
    nuevaTarjeta.classList.add("tarjeta");


    // Añadir botón a la tarjeta
    let btnTarjeta = document.createElement("button");
    btnTarjeta.innerText = "Resaltar";
    nuevaTarjeta.appendChild(btnTarjeta);

    // Añadir la tarjeta al contenedor
    targetas.appendChild(nuevaTarjeta);
});


