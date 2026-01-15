// Variables al inicio
let btnVer = document.getElementById("btnVer");
let btnCambiar = document.getElementById("btnCambiar");
let btnQuitar = document.getElementById("btnQuitar");
let btnComprobar = document.getElementById("btnComprobar");

let foto = document.getElementById("foto");
let enlace = document.getElementById("enlace");

//1. btnVer: mostrar en consola los atributos src de la imagen y href del enlace, y las propiedades width y target.
btnVer.addEventListener('click', function () {
    console.log(foto.getAttribute("src"));
    console.log(enlace.getAttribute("href"));
    console.log(foto.width);
    console.log(enlace.target);
});

//2. btnCambiar: actualizar src a "img2.jpg" y href a "https://www.youtube.com".
btnCambiar.addEventListener('click', function () {
    foto.setAttribute("src", "img2.jpg");
    enlace.setAttribute("href", "https://www.youtube.com");
});

//3. btnQuitar: eliminar alt de la imagen y target del enlace.
btnQuitar.addEventListener('click', function () {
    foto.removeAttribute("alt");
    enlace.removeAttribute("target");
});

//4. btnComprobar: alertar si la imagen tiene alt y si el enlace tiene target.
btnComprobar.addEventListener('click', function () {
    if (foto.hasAttribute("alt") && enlace.hasAttribute("target")) {
        alert("la imagen tiene alt y el enlace tiene target");
    }
});

//5. Mostrar en consola la diferencia entre atributo y propiedad de la imagen (getAttribute("width") vs img.width).
console.log("Atributo " + foto.getAttribute("width"));
console.log("propiedad " + foto.width);
