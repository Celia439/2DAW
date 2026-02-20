//  - 1. Proyecto base y primera petición GET con Axios

//1. crea una constante con la URL base del servidor: http://localhost:3000/alumnos
const SERVER = "http://localhost:3000/alumnos";

//para el id voy a pillar una variable con el id del ultimo alumno
let id = 0;

//para mostrar mensajes
let contenedor = document.getElementById("mensajesEST");

//lista donde van los alumnos
const lista = document.getElementById("alumnosList");

//variable para saber si estoy editando un alumno
let alumnoEditando = null;

//2. Realiza una petición GET usando Axios y promesas (.then /.catch).
axios
  .get(SERVER)
  .then((respuesta) => {
    //3. Muestra en consola:
    console.log("Objeto completo con .then(): ", respuesta); // a. El objeto completo response.
    console.log("Datos con .then(): ", respuesta.data); // b. Los datos obtenidos con response.data.

    //para el ejercicio 2
    mostrarAlumnos(respuesta.data);

    //4. Accede a una propiedad concreta de cada alumno
    console.log("Nombre del primer alumno", respuesta.data[0].nombre);

    //aqui pillo el ultimo id
    id = Number(respuesta.data[respuesta.data.length - 1].id);
  })
  .catch((error) => {
    console.error("Hubo un error:", error.message);
    contenedor.textContent = "Error al cargar los alumnos: " + error.message;
  });

//  - 2. Mostrar datos en el DOM
//2. Crea una función mostrarAlumnos(alumnos) que reciba un array de alumnos.
function mostrarAlumnos(alumnos) {
  lista.innerHTML = ""; // limpio la lista por si acaso

  //5. Muestra un mensaje de “Cargando alumnos...”
  contenedor.textContent = "Cargando alumnos...";

  alumnos.forEach((alumno) => {
    const li = document.createElement("li");

    // guardo el id dentro del li para luego editar
    li.dataset.id = alumno.id;

    // 4. Muestra, para cada alumno: nombre, email, curso
    // 4.1 Añade un botón “Editar”
    li.innerHTML = `
      Nombre: ${alumno.nombre}, 
  Email: ${alumno.email}, 
  Curso: ${alumno.curso}
  <button class="editar">Editar</button>
  <button class="eliminar">Eliminar</button>
    `;

    lista.appendChild(li);
  });

  contenedor.textContent = ""; // quito el mensaje de carga
}

//  - 3. Crear alumnos.
// 2. Captura el evento submit del formulario desde app.js.
let formulario = document.getElementById("formularioAlumno");

// 3. Envía los datos al servidor usando una petición POST con Axios y async/await.
formulario.addEventListener("submit", async function (event) {
  event.preventDefault(); // Evita que recargue la página

  try {
    //Regoger datos del alumno
    let nombre = document.getElementById("nombreAlumno").value;
    let email = document.getElementById("emailAlumno").value;
    let curso = document.getElementById("cursoAlumno").value;

    //objeto alumno
    let alumno = {
      nombre,
      email,
      curso,
    };

    // SI ESTOY EDITANDO → PUT
    if (alumnoEditando !== null) {
      await axios.put(`${SERVER}/${alumnoEditando}`, alumno);

      contenedor.innerHTML = "<p>Alumno actualizado correctamente</p>";

      alumnoEditando = null; // dejo de editar
    } else {
      // SI NO ESTOY EDITANDO → POST
      id = id + 1;
      alumno.id = String(id);

      await axios.post(SERVER, alumno);

      contenedor.innerHTML = "<p>Alumno creado correctamente</p>";
    }

    //recargar lista después de crear/editar
    const respuesta = await axios.get(SERVER);
    mostrarAlumnos(respuesta.data);

    //limpiar formulario
    formulario.reset();
  } catch (error) {
    console.error("Error en la petición: ", error.message);
    contenedor.textContent = "Error en la petición: " + error.message;
  }
});

//  - 4. Editar alumnos
// 2. Al pulsar el botón, carga los datos del alumno en el formulario existente.
lista.addEventListener("click", function (event) {
  //compruebo si el botón tiene la clase editar
  if (event.target.classList.contains("editar")) {
    //cojo el li del alumno
    const li = event.target.closest("li");

    //guardo el id del alumno que estoy editando
    alumnoEditando = li.dataset.id;

    //extraigo los datos del texto del li
    const partes = li.textContent.replace("Editar", "").split(",");

    document.getElementById("nombreAlumno").value = partes[0]
      .replace("Nombre:", "")
      .trim();

    document.getElementById("emailAlumno").value = partes[1]
      .replace("Email:", "")
      .trim();

    document.getElementById("cursoAlumno").value = partes[2]
      .replace("Curso:", "")
      .trim();

    contenedor.textContent = "Editando alumno " + alumnoEditando;
  }
});

//  - 5. Eliminar alumnos
// Usando el mismo proyecto base de los ejercicios anteriores.
// Elimina alumnos del servidor y del DOM.

// 1. Añade un botón “Eliminar” junto a cada alumno. (ya añadido arriba)

// 2. Solicita confirmación antes de realizar el borrado.
// 3. Realiza una petición DELETE con Axios utilizando async/await.
// 4. Muestra el código de estado HTTP devuelto por el servidor.
// 5. Elimina el alumno del DOM si la petición es correcta.
// 6. Gestiona errores de red o del servidor mostrando un mensaje adecuado.

lista.addEventListener("click", async function (event) {
  // compruebo si el botón tiene la clase eliminar
  if (event.target.classList.contains("eliminar")) {
    // pillo el li del alumno
    const li = event.target.closest("li");
    const idAlumno = li.dataset.id;

    // confirmación cutre pero funcional
    const seguro = confirm("¿Seguro que quieres eliminar este alumno?");
    if (!seguro) return;

    try {
      // 3. Petición DELETE con async/await
      const respuesta = await axios.delete(`${SERVER}/${idAlumno}`);

      // 4. Mostrar código de estado HTTP
      console.log("Estado de la respuesta DELETE:", respuesta.status);

      // 5. Eliminar del DOM
      li.remove();

      contenedor.innerHTML = "<p>Alumno eliminado correctamente</p>";
    } catch (error) {
      // 6. Gestión de errores
      console.error("Error al eliminar:", error.message);
      contenedor.textContent = "Error al eliminar el alumno: " + error.message;
    }
  }
});
