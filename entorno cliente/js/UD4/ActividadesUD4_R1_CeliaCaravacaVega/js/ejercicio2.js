// 1. Acceso a elementos del DOM:
//○ Obtener mediante document.getElementById():
//■ El párrafo de la descripción.*/
let descripcion = document.getElementById("descripcion");
//■ El botón Mostrar descripción.*/
let botonM = document.getElementById("btnMostrar");
//■ El botón Ocultar descripción.*/
let botonO = document.getElementById("btnOcultar");
// 2. Funcionalidad de los botones:
//○ Al hacer clic en Mostrar descripción:*/
botonM.addEventListener('click', function () {
    //■ Mostrar el párrafo de la descripción.
    descripcion.style.display = "block";
    //■ Cambiar el texto del botón a “Descripción visible”.
    botonM.textContent = "Descripción visible";
});
//○ Al hacer clic en Ocultar descripción:*/
botonO.addEventListener('click', function () {
    //■ Ocultar el párrafo de la descripción.*/
    descripcion.style.display = "none";
    //■ Cambiar el texto del botón a “Descripción oculta”.*/
    botonO.textContent = "Descripción oculta";
});