// Función para simular latencia de red
const fetchConRetardo = async (url, opciones = {}) => {
  // Creamos una promesa que se resuelve tras 2 segundos
  await new Promise((resolve) => setTimeout(resolve, 2000));
  return fetch(url, opciones);
};
/*6. Creación encadenada de recursos
Cuando se registra un nuevo cliente, la empresa crea
automáticamente un proyecto inicial asociado. Dado el Ej6.html y
dbEj6.json realiza las siguientes tareas:*/

let crear = document.getElementById("btnCrear");

//1. Realiza un POST para crear un nuevo cliente.
crear.addEventListener("click", async () => {
  const nombre = document.getElementById("nombre").value;
  const email = document.getElementById("email").value;
  const fechaRegistro = new Date().toISOString();
  $cliente = {
    nombre: nombre,
    email: email,
  };

  $proyecto = {
    nombre: nombre,
  clienteId: null,   
    fechaRegistro: fechaRegistro,
  };
  try {
    let respuestaCliente = await fetchConRetardo(
      "http://localhost:3000/clientes",
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify($cliente),
      },
    );
    if (!respuestaCliente.ok) {
      throw new Error("Error al crear el cliente");
    }
    let clienteCreado = await respuestaCliente.json();
    console.log("Cliente creado:", clienteCreado);
    //2. Una vez creado, obtén su id desde la respuesta.
    $proyecto.clienteId = clienteCreado.id;
    //3. Realiza un POST a /proyectos usando ese id como cliente.
    let respuestaProyecto = await fetchConRetardo(
      "http://localhost:3000/proyectos",
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify($proyecto),
      },
    );
    if (!respuestaProyecto.ok) {
      throw new Error("Error al crear el proyecto");
    }
    let proyectoCreado = await respuestaProyecto.json();
    console.log("Proyecto creado:", proyectoCreado);
  } catch (error) {
    console.error("Error en el proceso:", error);
  }
});


//4. Encadena las peticiones usando:

//● Promesas (then) o

//● async/await.

//5. Gestiona correctamente los errores en cada paso.
