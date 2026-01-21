//Dado el Ej6.html realiza las siguientes tareas:
let info = document.getElementById("info-dispositivo");
// 1. Mostrar en pantalla:
//● Ancho y alto de la pantalla usando screen.
let width = document.createElement("li");
width.textContent = "Ancho: " + screen.width;
info.appendChild(width);

let height = document.createElement("li");
height.textContent = "Altura: " + screen.height;
info.appendChild(height);

// 2. Mostrar información básica del navegador usando navigator:
//Nombre del navegador.
let nombreNav = document.createElement("li");
nombreNav.textContent = "Nombre del navegador: " + navigator.userAgent;
info.appendChild(nombreNav);
// ● Idioma.
let idioma = document.createElement("li");
idioma.textContent = "Idioma del nabegador: " + navigator.language;
info.appendChild(idioma);

// ● Sistema operativo (si es posible).
let sistema = document.createElement("li");
sistema.textContent = "Sistema operativo: " + navigator.platform;
info.appendChild(sistema);
//3. Mostrar un aviso si la pantalla tiene menos de cierto ancho (simulación responsive).
if (screen.width < 768) {
  alert("Activando responsive");
}
