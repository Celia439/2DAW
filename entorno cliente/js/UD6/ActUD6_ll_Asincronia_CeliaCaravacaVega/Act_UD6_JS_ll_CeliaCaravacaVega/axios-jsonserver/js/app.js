//  - 1. Proyecto base y primera petición GET con Axios

//1. crea una constante con la URL base del servidor: http://localhost:3000/alumnos
const SERVER = "http://localhost:3000/alumnos";

//2. Realiza una petición GET usando Axios y promesas (.then /.catch).

axios
  .get(SERVER)
  .then((respuesta) => {
    //3. Muestra en consola:
    //  a. El objeto completo response.
    console.log("Objeto completo con .then(): ", respuesta);
    //  b. Los datos obtenidos con response.data.
    console.log("Datos con .then(): ", respuesta.data);
    //para el ejercicio 2
    mostrarAlumnos(respuesta.data);
    //4. Accede a una propiedad concreta de cada alumno (por ejemplo, nombre) y muéstrala por consola.
    console.log("Nombre del primer alumno", respuesta.data[0].nombre);
  })
  .catch((error) => {
    // 5. Gestiona los errores mostrando el mensaje de error por consola.
    console.error("Hubo un error:", error.message);
    //6. Si ocurre un error en la petición, muestra un mensaje de
    //error visible en la página.
    const contenedor = document.getElementById("mensajesEST");
    contenedor.textContent = "Error al cargar los alumnos: " + error.message;
  });

// 6. Después, comenta la petición anterior y repite la petición utilizando async/await. y try/catch.
/*async function obtenerAlumnos() {
  try {
    // 7. Muestra por consola los datos obtenidos.
    const respuesta = await fetch(SERVER);
    if (!respuesta.ok) {
      throw new Error("Error HTTP: " + respuesta.status);
    }
    const datos = await respuesta.json();

    console.log("Datos con async/await: ", datos);
    console.log("Datos con async/await: ", datos[0].nombre);
  } catch (error) {
    console.error("Hubo un error:", error.message);
  }
}
obtenerAlumnos();
*/

//  - 2. Mostrar datos en el DOM
//1. Utiliza el index.html y app.js existentes.
//2. Crea una función mostrarAlumnos(alumnos) que reciba un array de alumnos.
function mostrarAlumnos(alumnos) {
  // 3. Recorre response.data y muestra cada alumno dentro del contenedor ya creado (#lista-alumnos).
  const lista = document.getElementById("alumnosList");
  //5. Muestra un mensaje de “Cargando alumnos...” en el contenedor de
  //mensajes mientras se realiza la petición.
  let contenedor = document.getElementById("mensajesEST");
  contenedor.textContent = "Cargando alumnos...";
  alumnos.forEach((alumno) => {
    const li = document.createElement("li");
    // 4. Muestra, para cada alumno:
    // ○ Nombre.
    // ○ Email.
    // ○ Curso.
    li.textContent = `Nombre: ${alumno.nombre}, Email: ${alumno.email}, Curso: ${alumno.curso}`;
    lista.appendChild(li);
  });
  contenedor.textContent = ""; // Limpia el mensaje de carga después de mostrar los alumnos
}
//  - 3. Crear alumnos.

//1. Añade al index.html un formulario para crear alumnos con:
//○ Nombre.
//○ Email.
//○ Curso.
// 2. Captura el evento submit del formulario desde app.js.
// 3. Envía los datos al servidor usando una petición POST con Axios y async/await.
// 4. Gestiona la petición con try/catch.
// 5. Muestra un mensaje de éxito cuando el alumno se cree correctamente.
// 6. Añade el nuevo alumno a la lista sin recargar la página.
// 7. Limpia el formulario tras el envío.