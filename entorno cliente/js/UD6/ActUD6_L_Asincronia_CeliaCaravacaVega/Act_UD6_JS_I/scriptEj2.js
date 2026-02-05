// Función para simular latencia de red
const fetchConRetardo = async (url, opciones = {}) => {
    // Creamos una promesa que se resuelve tras 2 segundos
    await new Promise(resolve => setTimeout(resolve, 2000));
    return fetch(url, opciones);
};
// 2. Alta de incidencias
// El departamento de soporte registra incidencias técnicas.
// Dado el Ej2.html realiza las siguientes tareas:
// 1. Crea db.json y añade un recurso llamado incidencias con:
// ● Id.
// ● Título.
// ● Descripción.
// ● Prioridad(alta, media, baja).
// ● Fecha.
// (No es necesario que tenga datos iniciales).

// 2. En JavaScript:
let boton = document.getElementById("btnCrear");
// ● Captura el evento click del botón.
let id=0;
boton.addEventListener('click', function () {
    // ● Crea un objeto incidencia con los datos del formulario.
    let titulo =document.getElementById("titulo");
    let desc=document.getElementById("descripcion");
    let pri=document.getElementById("prioridad");
    let fech=Date();
    id++;
    nuevaIncidencia={
            "id":id,
            "titulo":titulo,
            "descripción":desc,
            "prioridad":pri,
            "fecha":fech
    };

    // ● Realiza una petición POST a / incidencias usando fetch + then /catch.
    fetchConRetardo('http://localhost:3000/incidencias', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        // ● Envía los datos en formato JSON.
        body: JSON.stringify(nuevaIncidencia)
    })
        .then(respuesta => respuesta.json())
        .then(datos => console.log('Incidencia creada:', datos))
        // ● Muestra por consola la incidencia creada.
        .catch(error => console.error('Error al crear productos:', error));
});


