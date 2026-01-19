let bloque= document.getElementById("bloque");
//1. Contar cuántos nodos devuelve childNodes y cuántos devuelve children.
console.log("ChildrenNode: "+bloque.childNodes.length);
console.log("Children: "+bloque.children.length);
//2. Explicar la diferencia observada (en comentarios del código).
//La diferencia de childNodes(Tiene en cuenta absolutamente cada uno de los nodos de texto y etiquetas)
// y children (Se centra solo en los nodos de etiquetas)

//3. Resaltar visualmente (con JS) solo los nodos que sean elementos HTML.
document.body.childNodes.forEach(nodo => {
  if (nodo.nodeType === 1) { // ELEMENT_NODE
    nodo.style.border = "2px solid blue";
  }
});
//4. Mostrar en consola el tipo de nodo (nodeType) de varios hijos.
//   Número | Tipo de nodo                                 
//   ----------------------
//   `1`    | ELEMENT_NODE (etiquetas HTML)                
//   `3`    | TEXT_NODE (texto, espacios, saltos de línea) 
//   `8`    | COMMENT_NODE                                 
//   `9`    | DOCUMENT_NODE                                
//   `10`   | DOCUMENT_TYPE_NODE                           

console.log(bloque.childNodes[0].nodeType);
console.log(bloque.childNodes[1].nodeType);
console.log(bloque.childNodes[2].nodeType);
console.log(bloque.childNodes[3].nodeType);

