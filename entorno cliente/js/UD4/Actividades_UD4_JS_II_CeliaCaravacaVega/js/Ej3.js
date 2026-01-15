//variables
let contenido = document.getElementById("contenido");
let btnCambiarText = document.getElementById("btnCambiarTexto");
let btnAniadirElemento = document.getElementById("btnAñadirElemento");
let btnReemplazar = document.getElementById("btnReemplazar");
let btnEliminar = document.getElementById("btnEliminar");

//1. btnCambiarTexto: modificar el primer párrafo con innerText y
//  el segundo con innerHTML incluyendo un <strong>.
btnCambiarText.addEventListener('click', function () {
    contenido.children[0].innerText = "primer p";
    contenido.children[1].innerHTML = "<p><strong>Segundo p fuerte</strong></p>";
});

//2. btnAñadirElemento: crear un nuevo <p> con texto "Párrafo 
// añadido" y añadirlo al final.
btnAniadirElemento.addEventListener('click', function () {
    let p = document.createElement("p");
    let text = document.createTextNode("El tercero");
    p.appendChild(text);
    contenido.appendChild(p);
});

//3. btnReemplazar: reemplazar el primer párrafo por uno nuevo con 
// "Primer párrafo reemplazado".
btnReemplazar.addEventListener('click', function () {
    contenido.children[0].innerHTML = "<p>Primer párrafo reemplazado</p>";
});

//4. btnEliminar: eliminar el último párrafo de #contenido.
btnEliminar.addEventListener('click', function () {
    contenido.children[(contenido.children.length-1)].remove();
});
//5. Clonar el primer párrafo y añadirlo al final usando cloneNode(true).

    let clon = contenido.children[0].cloneNode(true);

    contenido.appendChild(clon);