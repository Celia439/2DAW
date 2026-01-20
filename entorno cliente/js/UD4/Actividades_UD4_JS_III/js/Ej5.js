//Dado el Ej5.html con tres botones:
//“Página anterior”
let btnA=document.getElementById("ntnAtras");
//“Página siguiente”
let btnS=document.getElementById("ntnAdelante");
//“Cambiar URL”
let btnUrl=document.getElementById("ntmCambiar");

//Realiza las siguientes tareas:
//1. Usar history.back() y history.forward() en los botones correspondientes.
btnA.histoty.back();
btnA.histoty.forward();
//2. Mostrar en consola el número de páginas del historial (history.length).
console.log(history.length);
//3. Usar history.pushState() para cambiar la URL sin recargar la página.
history.pushState()
//4. Mostrar un mensaje indicando que la URL ha cambiado dinámicamente.
console.log("La pag cambio la url dinámicamente");