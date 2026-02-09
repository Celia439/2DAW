// Función para simular latencia de red
const fetchConRetardo = async (url, opciones = {}) => {
    // Creamos una promesa que se resuelve tras 2 segundos
    await new Promise(resolve => setTimeout(resolve, 2000));
    return fetch(url, opciones);
};
/*3. Proyectos de la empresa
Una empresa quiere visualizar los proyectos activos. Dado el
Ej3.html y dbEj3.json realiza las siguientes tareas:*/
//1. Realiza una petición GET a /proyectos usando async/await.
async function obtenerProyectos() {
    //3. Usa try/catch.
    try {
        const response = await fetchConRetardo('http://localhost:3000/proyectos');
        //2. Comprueba errores HTTP con if (!response.ok).
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        //4. Muestra los proyectos en el DOM.
        const proyectos = await response.json();
        
        const lista= document.getElementById('listaProyectos');
      proyectos.forEach(proyecto => {
            let li = document.createElement("li");
            li.innerHTML = `<p>Proyecto: ${proyecto.id}</p><p>Nombre: ${proyecto.nombre}</p><p>Cliente: ${proyecto.cliente}</p><p>Estado: ${proyecto.estado}</p><p>Fecha Inicio: ${proyecto.fechaInicio}</p><p>Fecha Fin: ${proyecto.fechaFin}</p><p>Responsable: ${proyecto.responsable}</p>`;
            lista.appendChild(li);
        });

    } catch (error) {
        console.error('Error al obtener proyectos:', error);
    }
}


obtenerProyectos();