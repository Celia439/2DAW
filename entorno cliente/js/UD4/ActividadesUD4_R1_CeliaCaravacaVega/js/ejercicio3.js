//Dado el ejercicio3.html crea el archivo script3.js y realiza las siguientes acciones:
//1. Acceso al DOM usando querySelector():
//Acceder a:
//○ El primer plan usando un selector de clase.
let plan1= document.querySelector(".plan");
//○ El botón usando un selector de id.
let boton= document.getElementById("btnSeleccionar");
//○ El primer elemento <h3> usando un selector de etiqueta.
let h3Primero= document.getElementsByTagName("h3")[0];
document.getElementById("resultado").innerHTML=h3Primero;
//2. Funcionalidad del botón:
//Al hacer clic en el botón Seleccionar plan:
//○ Añadir la clase CSS seleccionado únicamente al primer plan.
plan1.addEventListener.apply(".plan");
//○ Cambiar el texto del <h3> del plan seleccionado a: “Plan seleccionado”
//○ Mostrar en el párrafo resultado el mensaje: “Has seleccionado el plan básico”
