// Función para simular latencia de red
const fetchConRetardo = async (url, opciones = {}) => {
  // Creamos una promesa que se resuelve tras 2 segundos
  await new Promise((resolve) => setTimeout(resolve, 2000));
  return fetch(url, opciones);
};
/*4. Registro de nuevos clientes
Un comercial registra nuevos clientes desde la web. Dado el
Ej4.html realiza las siguientes tareas:*/

//1. Crea db.json con un recurso llamado clientes con:
//● Nombre.
//● Email.
//● Empresa.
//(No es necesario que tenga datos iniciales).
let alta = document.getElementById("btnAlta");
//2. Captura el evento click.
alta.addEventListener("click", async () => {
  //3. Crea un objeto cliente.
  let cliente = {
    nombre: document.getElementById("nombre").value,
    email: document.getElementById("email").value,
    empresa: document.getElementById("empresa").value,
  };
  //4. Realiza una petición POST a /clientes usando async/await + try/catch.
  try {
    let respuesta = await fetchConRetardo("http://localhost:3000/clientes", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(cliente),
    });
    //5. Muestra por consola el cliente creado.
    console.log("Cliente creado:", cliente);
  } catch (error) {
    console.error("Error al crear el cliente:", error);
  }
});

