<?php
//Conexión
$conexion = new mysqli('localhost', 'root', '', 'centros');
$conexion->set_charset('utf8');
/**BBDD
 *  Centros
 * Alumnos (dni, nombre, edad)
 * Asignaturas (codigo, nombre, creditos, trimestre)
 * Matriculas (dni, codigo, año, nota)
 */
echo "<h2>";
echo "1. Muestra el DNI, nombre y edad de todos los alumnos que existen en la base de datos.";
echo "</h2>";

$consulta = "select dni,nombre,edad from alumnos";
// obtener consulta
$resultado = $conexion->query($consulta);

while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
    echo " DNI: $fila[dni]  $fila[nombre] tienen $fila[edad]<br>";
}

echo "<h2>";
echo " 2.Muestra el código, nombre, créditos y trimestre de todas las asignaturas disponibles en la base de datos.";
echo "</h2>";
$consulta2 = "select codigo,nombre,creditos from asignaturas";
$resultado2 = $conexion->query($consulta2);

while ($fila = $resultado2->fetch_array(MYSQLI_ASSOC)) {
    echo " Código: $fila[codigo] Nombre: $fila[nombre] Creditos: $fila[creditos]<br>";
}

echo "<h2>";
echo "3. Muestra el DNI del alumno, código de asignatura, año y nota de todas las matrículas registradas.";
echo "</h2>";
$consulta3 = "select dni,codigo,anio,nota from matriculas";
$resultado3= $conexion->query($consulta3);

while($fila=$resultado3->fetch_array(MYSQLI_ASSOC)){
    echo "DNI: $fila[dni] Código: $fila[codigo] Año: $fila[anio] Nota: $fila[nota]<br>";
}

echo "<h2>";
echo "4. Muestra el nombre y la edad de los alumnos cuya edad sea superior a 22 años";
echo "</h2>";

$consulta4= "select nombre,edad from alumnos where edad>22";
$resultado4= $conexion->query($consulta4);
while($fila=$resultado4->fetch_array(MYSQLI_ASSOC)){
    echo "nombre: $fila[nombre] edad: $fila[edad]<br>";
}
echo "<h2>";
echo "</h2>";

//no te olvides
$conexion->close();