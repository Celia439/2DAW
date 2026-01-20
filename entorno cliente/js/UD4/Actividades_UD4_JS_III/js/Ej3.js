//1. Al hacer clic en un botón dentro de una tarjeta:
let targetas = document.getElementById("cards");
targetas.addEventListener("click", function (event) {
  if (event.target.matches("button")) {
    //Cambiar el estilo de la tarjeta actual.
    event.target.parentNode.style.backgroundColor = "lightyellow";
    event.target.parentNode.style.border = "dashed greenyellow 5px";
    //Cambiar el estilo de la tarjeta siguiente usando nextElementSibling.
    //2. Usar closest('.card') para identificar la tarjeta a la que pertenece el botón.
    const card = event.target.closest(".card");

    if (card.nextElementSibling != null) {
      card.nextElementSibling.style.backgroundColor = "yellow";
    } else {
      //3. Si no existe tarjeta siguiente, mostrar un mensaje en consola.
      console.log("No hay un siguiente elemento");
    }
  }
});
