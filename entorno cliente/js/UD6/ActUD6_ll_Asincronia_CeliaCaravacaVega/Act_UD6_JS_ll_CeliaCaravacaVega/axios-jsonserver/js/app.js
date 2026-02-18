
//1. crea una constante con la URL base del servidor: http://localhost:3000/alumnos
const SERVER = "http://localhost:3000/alumnos";

//2. Realiza una petición GET usando Axios y promesas (.then /.catch).
axios.get(SERVER)
    .then((respuesta) => {
        //3. Muestra en consola:
        //  a. El objeto completo response.
        console.log("Objeto completo con .then(): ", respuesta);
        //  b. Los datos obtenidos con response.data.
        console.log("Datos con .then(): ", respuesta.data);
        //4. Accede a una propiedad concreta de cada alumno (por ejemplo, nombre) y muéstrala por consola.
        console.log("Nombre del primer alumno");
    })
    .catch((error)=>{
        // 5. Gestiona los errores mostrando el mensaje de error por consola.
        console.error("Hubo un error:",error.message);
    });


    // 6. Después, comenta la petición anterior y repite la petición utilizando async/await. y try/catch.

    // 7. Muestra por consola los datos obtenidos.

    // 8. Si ocurre un error, muestra el código de estado HTTP.




