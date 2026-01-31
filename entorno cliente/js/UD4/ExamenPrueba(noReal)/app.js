/*🧠 PARTE 1 – Validación del formulario (DOM)

En app.js:*/

//Valida el formulario SIN usar try/catch.

//Reglas:
let titulo = document.getElementById("titulo");
let formulario = document.getElementById("formulario");
let nombre = document.getElementById("nombre");
let email = document.getElementById("email");
let edad = document.getElementById("edad");
let btnAgregar = document.getElementById("btnAgregar");
let mensaje = document.getElementById("mensaje");
let listaUsuarios = document.getElementById("listaUsuarios");
let btnInfo = document.getElementById("btnInfo");
let btnCambiarURL = document.getElementById("btnCambiarURL");

//Validar formulario fuction
function validarFormulario(nombre, edad, email) {
  let correcto = false;
  //Nombre: no vacío y solo letras y espacios. ((aun asi no me acuerdo)(primera duda como era los matches (entre los maces de php py ect me lio)(en el examen nos dejan la pag de js manual asi que lo e mirado buscando match))
  if (!nombre.value.match(/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/)) {
    mensaje.textContent =
      "error en el campo nombre solo puede contener letras y espacios";
    mensaje.classList.add("error");
    //Email: formato correcto (nombre@dominio.ext).
  } else if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/)) {
    mensaje.textContent =
      "error en el campo email formato incorrecto Ejemplo: nombre@dominio.ext";
    mensaje.classList.add("error");
    //Edad: número entre 18 y 99.
  } else if (edad.value < 18 || edad.value > 99) {
    mensaje.textContent = "error en el campo edad: debe estar entre 18 y 99";
    mensaje.classList.add("error");
  } else {
    correcto = true;
  }
  return correcto;
}
//numero incremental
let $num = 0;
//crear el usuario
btnAgregar.addEventListener("click", function () {
  if (!validarFormulario(nombre, edad, email)) {
    mensaje.textContent = "clase ok";
    mensaje.classList.add("ok");
    //👤 PARTE 2 – Crear y manipular nodos
    //Cuando el formulario sea correcto:
    //Crear dinámicamente un <div class="usuario"> que contenga:
    let usuario = document.createElement("div");
    usuario.setAttribute("class", "usuario");
    $num += 1;
    usuario.setAttribute("data-id", $num);

    //<p class="nombre"></p>
    let nombreP = document.createElement("p");
    let nombreT = document.createTextNode(nombre.value);
    nombreP.textContent = nombreT;
    nombreP.setAttribute("class", "nombre");
    //<p class="email"></p>
    let emailP = document.createElement("p");
    let emailT = document.createTextNode(email.value);
    emailP.textContent = emailT;
    emailP.setAttribute("class", "email");

    //<p class="edad"></p>
    let edadP = document.createElement("p");
    let edadT = document.createTextNode(edad.value);
    edadP.setAttribute("class", "edad");
    edadP.textContent = edadT;
    //<button>Activar</button>
    let activar = document.createElement("button");
    let activarT = (document.createTextNode = "activar");
    activar.textContent = activarT;

    //<button>Eliminar</button>
    let eliminar = document.createElement("button");
    let eliminarT = (document.createTextNode = "eliminar");
    eliminar.textContent = eliminarT;

    //usuario ensamblaje
    usuario.appendChild(nombreP);
    usuario.appendChild(emailP);
    usuario.appendChild(edadP);
    usuario.appendChild(activar);
    usuario.appendChild(eliminar);

    //Añadirlo al final de #listaUsuarios.
    listaUsuarios.appendChild(usuario);
    //Usar:
    /*
    createElement

    createTextNode

    appendChild*/
  }
});

//Muestra mensajes claros en <p id="mensaje">:
//Error → clase error

//Correcto → clase ok

//📌 Si hay error, no se añade el usuario.
/*


🧩 PARTE 3 – Eventos y delegación
Usa UN SOLO addEventListener en #listaUsuarios.
Funcionalidades:*/
listaUsuarios.addEventListener("click", function (event) {
  //Botón Activar:
  //Añade la clase activo al usuario (closest(".usuario"))(me qude pilla)(solventado tube problemas al tratar con classlisty elclosest)
  console.log(event.target.closest(".usuario"));
  if ((event.target.textContent === "activar")) {
    let user = event.target.closest(".usuario");
    user.classList.add("activo");
    /*🌲 PARTE 4 – Navegación por el DOM
    Cuando se active un usuario:
    Mostrar en consola:*/

    //Su nodo padre
    console.log(event.target.parentNode);
    //Sus hijos (children)
    console.log(user.children);

    //El siguiente usuario usando nextElementSiblingç(illo por que me lo elimina>:())
    if (user.nextElementSibling != null) {
      console.log(user.nextElementSibling);
    } else {
      //Si no hay siguiente usuario, mostrar:
      console.log("Este es el último usuario");
    }
    // parte 5 style
    user.style.border = "solid green 4px";
    //tiene el ususario el data id?
    if (user.hasAttribute(event.currentTarget)) {
      console.log(event.currentTarget.getAttribute("data-id"));
    }
  } //(Creo que me locarge pero no lo veo )
  //Quita la clase activo al resto de usuarios
  //Botón Eliminar:
  //Elimina el usuario del DOM usando parentNode o remove()
  if ((event.target.textContent === "eliminar")) {
    event.target.parentNode.remove();
  }

  /*📌 Obligatorio usar:
//event.target
//event.currentTarget(donde lo meto?)
//matches()
//closest()*/
});
/*
🌍 PARTE 6 – BOM
Botón “Info del navegador”

Al pulsarlo:

Mostrar en alert():*/
btnInfo.addEventListener("click", function () {
  //screen.width
  //navigator.language
  //navigator.userAgent
  alert(
    "Tamaño de la pantalla: " +
      screen.width +
      "- idioma del nabegador" +
      navigator.language +
      "- usuarioDeNabegador: " +
      navigator.userAgent,
  );
});

//Botón “Cambiar URL”
btnCambiarURL.addEventListener("click", function () {
  //Usar history.pushState() para cambiar la URL a:
  //?pagina=usuarios
  history.pushState(null,"","?pagina=usuarios"); //(Que parametro me falta ?)
  //Mostrar en consola:
  //URL cambiada sin recargar
  console.log("url cambiada sin recargar");
});
