// Función para simular latencia de red
const fetchConRetardo = async (url, opciones = {}) => {
  // Creamos una promesa que se resuelve tras 2 segundos
  await new Promise((resolve) => setTimeout(resolve, 2000));
  return fetch(url, opciones);
};
/*5. Filtrado y búsqueda de datos
El departamento de recursos humanos necesita buscar empleados por
departamento sin recargar la página. Dado el Ej5.html y dbEj5.json
realiza las siguientes tareas:*/

//1. Realiza una petición GET a /empleados.
const lista = document.getElementById("listaEmpleados");
async function cargarEmpleados() {
  try {
    const respuesta = await fetchConRetardo("http://localhost:3000/empleados");
    if (!respuesta.ok) {
      throw new Error(`Error al cargar los empleados: ${respuesta.statusText}`);
    }
    const empleados = await respuesta.json();
    //2. Muestra todos los empleados al cargar la página.
    empleados.forEach((empleado) => {
      const li = document.createElement("li");
      li.textContent = `${empleado.id} - ${empleado.nombre} - ${empleado.puesto} - ${empleado.departamento} - ${empleado.salario}`;
      lista.appendChild(li);
    });
    //3. Añade un campo de texto para filtrar por departamento.
    const filtroInput = document.getElementById("filtro");
    filtroInput.addEventListener("input", () => {
        //4. Filtra los datos en el cliente (sin nueva petición).
        const filtro = filtroInput.value.toLowerCase();
        const empleadosFiltrados = empleados.filter((empleado) =>
            empleado.departamento.toLowerCase().includes(filtro)
        );
        // Limpiar la lista antes de mostrar los resultados filtrados
        lista.innerHTML = "";
        empleadosFiltrados.forEach((empleado) => {
            const li = document.createElement("li");
            li.textContent = `${empleado.id} - ${empleado.nombre} - ${empleado.puesto} - ${empleado.departamento} - ${empleado.salario}`;
            lista.appendChild(li);
        });
    });

  } catch (error) {
      //5. Maneja los errores con catch o try/catch.
    console.error("Error:", error);
  }
}
cargarEmpleados();


