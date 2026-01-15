//variables
let titulo = document.getElementById("titulo");
let myButton = document.getElementById("myButton");
//1. Usar DOMContentLoaded para cambiar el textContent del título a "DOM listo para JS".
document.addEventListener("DOMContentLoaded", function () {
    titulo.textContent = "DOM listo para JS";
});
//2. Asignar directamente a myButton.onclick una función que muestre un alert "Botón clickeado".
myButton.onclick = function () {
    alert("Botón clikeado");
}
//3. Añadir y eliminar el mismo listener con addEventListener y removeEventListener para ver cómo se comporta.
//El boton se crea el evento y se elimina por lo que no ocurre nada
myButton.addEventListener('click', function () {
    myButton.removeEventListener('click', function () {
        alert("Eliminado");
    });
});