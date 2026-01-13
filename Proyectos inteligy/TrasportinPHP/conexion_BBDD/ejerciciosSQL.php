<?php
//Conexión
$conexion=new mysqli('localhost','root','','centro');
$conexion->set_charset('utf8');
/**BBDD
 *  Centros
 * alumnos()
 * asignaturas
 * mattriculas
 */
//1. Muestra el DNI, nombre y edad de todos los alumnos que existen en la base de
//datos.
$consulta= "select dni,nombre,edad from alumnos";
// obtener consulta
$resultado= $conexion->query($consulta);

//$numeros_filas=$resultado->num_rows;
//echo "Se han encontrado $numeros_filas alumnos";

while($fila =$resultado->fetch_array(MYSQLI_ASSOC)){
    echo "<br> DNI: $fila[dni]  $fila[nombre] tienen $fila[edad]";
}
//no te olvides
$conexion->close();