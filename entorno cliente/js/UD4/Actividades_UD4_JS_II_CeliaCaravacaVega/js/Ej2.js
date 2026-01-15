//Variables
let mensaje = document.getElementById("mensaje");
let btnAdd = document.getElementById("btnAdd");
let btnRemove = document.getElementById("btnRemove");
let btnToggle = document.getElementById("btnToggle");
let btnStyle=document.getElementById("btnStyle");

//1. btnAdd: añadir clases resaltado y alerta al mensaje.
btnAdd.addEventListener('click', function () {
    mensaje.classList.add('resaltado','alerta');
});

//2. btnRemove: quitar resaltado y alerta.
btnRemove.addEventListener('click', function () {
    mensaje.classList.remove('resaltado','alerta');
});

//3. btnToggle: alternar solo la clase resaltado.
btnToggle.addEventListener('click', function () {
    mensaje.classList.toggle('resaltado');
    mensaje.classList.toggle('alerta');
});

//4. btnStyle: cambiar en línea fontStyle a italic y border a 2px solid red.
btnStyle.addEventListener('click',function(){
mensaje.style.fontStyle="italic";
mensaje.style.border="2px solid red";

});

//5. Mostrar en consola si el elemento contiene la clase alerta usando contains.
console.log(mensaje.classList.contains('alert'));