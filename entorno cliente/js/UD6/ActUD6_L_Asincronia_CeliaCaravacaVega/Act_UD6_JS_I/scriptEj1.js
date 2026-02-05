// Función para simular latencia de red
const fetchConRetardo = async (url, opciones = {}) => {
    // Creamos una promesa que se resuelve tras 2 segundos
    await new Promise(resolve => setTimeout(resolve, 2000));
    return fetch(url, opciones);
};

//1. Empleados de una empresa
// Una empresa necesita consultar el listado de sus empleados desde 
// una API simulada. Dado el Ej1.html:

// 1. Creación del JSON (alumnado):Crea un archivo db.json con un
//  recurso llamado empleados que contenga al menos 5 empleados con
//  los siguientes campos:
// ● Id.(int)
// ● Nombre.(str)
// ● Puesto.(int)
// ● Departamento.(int)
// ● Salario.(double)

// 2. En JavaScript:
let lista = document.getElementById("listaEmpleados");
// ● Realiza una petición GET a /empleados usando fetch + then/catch.

//  -Petición get a json server para acceder a los empleados
fetchConRetardo('http://localhost:3000/empleados')
    .then(respuesta => {
        // ● Comprueba response.ok.
        if (!respuesta.ok) {
            throw new Error('Acaba de ocurrir un error al recolectar los usuarios' + respuesta.status);
        }
        // ● Convierte la respuesta a JSON.
        return respuesta.json();
    })
    // ● Muestra los empleados en la lista <ul>.
    .then(empleados => {
        empleados.forEach(empleado => {
            let li = document.createElement("li");
            li.textContent = `Empleado: ${empleado.id} - ${empleado.nombre} - Puesto: ${empleado.puesto} - Departamento: ${empleado.departamento} - Salario: ${empleado.salario}`;
            lista.appendChild(li);
        });
    })
    // ● Muestra los errores por consola.
    .catch(error => console.error('Error:', error));
