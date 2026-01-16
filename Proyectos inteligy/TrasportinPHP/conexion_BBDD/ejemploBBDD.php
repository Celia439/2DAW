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
//alumnos menores a 21
$mayores = 21;
$sentiencia = "select * from alumnos where edad >= ? ";
$consulta = $conexion->prepare($sentiencia);
$consulta->bind_param("i", $mayores);
$consulta->bind_result($dni, $nombre, $edad);
$consulta->execute();
echo "A parte mayores a 21<br>";
while ($consulta->fetch()) {
    echo "$dni , $nombre, $edad <br>";
}
//no te olvides
$consulta->close();
$conexion->close();