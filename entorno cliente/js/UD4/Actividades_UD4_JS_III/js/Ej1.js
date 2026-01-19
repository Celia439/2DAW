//1. Seleccionar un artículo concreto por su id.
const articulo1 = document.getElementById("articulo1");
//2. Mostrar en consola:
//Su nodo padre usando parentNode.
console.log(articulo1.parentNode);
//Todos sus nodos hijos con childNodes.
console.log(articulo1.childNodes);
// Solo los hijos de tipo elemento con children.
console.log(articulo1.children);
//3. Acceder:
//Al primer nodo hijo (firstChild). 
 console.log(articulo1.firstChild);
//  Al primer hijo que sea un elemento (firstElementChild).
console.log(articulo1.firstElementChild);
//4. Mostrar en consola el siguiente artículo usando:
//nextSibling
console.log(articulo1.nextSibling);
//nextElementSibling
console.log(articulo1.nextElementSibling);
// 5. Usar closest() para localizar el contenedor principal del artículo.
console.log(articulo1.closest(".contenedor"));
