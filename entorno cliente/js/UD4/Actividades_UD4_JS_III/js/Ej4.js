//Dado el Ej4.html muestra dinámicamente:
let lista = document.getElementById("info-url");
//Después, realiza las siguientes tareas:

//1. Mostrar cada propiedad del objeto location en un <li> distinto.

//URL completa
let url = document.createElement("li");
url.innerText ="URL : "+ location.href;
lista.appendChild(url);
//Protocolo
let protocol = document.createElement("li");
protocol.innerText = "Protocol: "+location.protocol;
lista.appendChild(protocol);
//Host
let host = document.createElement("li");
host.innerText ="Host: "+ location.host;
lista.appendChild(host);
//Hostname
let hostName = document.createElement("li");
hostName.innerText ="HostName: "+location.hostname;
lista.appendChild(hostName);
//Puerto
let port = document.createElement("li");
port.innerText ="Port: "+ location.port;
lista.appendChild(port);
//Pathname
let pathName = document.createElement("li");
pathName.innerText = "PathName: "+location.pathname;
lista.appendChild(pathName);
//Querystring
let querystring = document.createElement("li");
querystring.innerText ="QueryString: "+ location.querystring;
lista.appendChild(querystring);
//Hash
let hash = document.createElement("li");
hash.innerText ="Hash: "+location.hash;
lista.appendChild(hash);
//2. Detectar si la URL contiene parámetros (location.search) y mostrar un mensaje.
if(location.search!=""){
console.log("Si tiene parametros");
}else{
console.log("No tiene parametros");
}
//3. Si hay hash, cambiar el color de fondo de la página.
if(location.hash){
document.body.style.backgroundColor="purple";
}