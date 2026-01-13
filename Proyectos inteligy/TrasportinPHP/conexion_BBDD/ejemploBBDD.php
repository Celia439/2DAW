<?php
$conexion=new mysqli('localhost','root','','centro');
$conexion->set_charset('utf8');

$consulta= "select nombre,edad from alumnos";
$resultado= $conexion->query($consulta);
$numeros_filas=$resultado->num_rows;
echo "Se han encontrado $numeros_filas alumnos";

while($fila =$resultado->fetch_array(MYSQLI_ASSOC)){
    echo "<br> $fila[nombre] tienen $fila[edad]";
}
//no te olvides
$conexion->close();