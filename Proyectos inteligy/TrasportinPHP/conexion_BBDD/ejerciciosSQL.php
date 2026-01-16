<?php
//Conexión
$conexion = new mysqli('localhost', 'root', '', 'centro');
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
$resultado3 = $conexion->query($consulta3);

while ($fila = $resultado3->fetch_array(MYSQLI_ASSOC)) {
    echo "DNI: $fila[dni] Código: $fila[codigo] Año: $fila[anio] Nota: $fila[nota]<br>";
}

echo "<h2>";
echo "4. Muestra el nombre y la edad de los alumnos cuya edad sea superior a 22 años Good";
echo "</h2>";

$consulta4 = "select nombre,edad from alumnos where edad>22";
$resultado4 = $conexion->query($consulta4);
while ($fila = $resultado4->fetch_array(MYSQLI_ASSOC)) {
    echo "nombre: $fila[nombre] edad: $fila[edad]<br>";
}
echo "<h2>";
echo "5. Muestra el nombre y los créditos de las asignaturas que se imparten en el primer trimestre.Good";
echo "</h2>";

$consulta5 = "select nombre,creditos from asignaturas where  trimestre=1";
$resultado5 = $conexion->query($consulta5);

while ($file = $resultado5->fetch_array(MYSQLI_ASSOC)) {
    echo "Nombre: $file[nombre] Creditos: $file[creditos]<br>";
}
echo "<h2>";
echo "6. Muestra el DNI del alumno, código de asignatura y nota de las matrículas correspondientes al año 2020.Good";
echo "</h2>";
$consulta6 = "select dni,codigo,nota,anio from matriculas where anio>='2020-00-00'";
$resultado6 = $conexion->query($consulta6);

while ($file = $resultado6->fetch_array(MYSQLI_ASSOC)) {
    echo "DNI: $file[dni] Código: $file[codigo] Nota: $file[nota] $file[anio]<br>";
}
echo "<h2>";
echo "7. Muestra el DNI del alumno, nombre del alumno, nombre de la asignatura, año y nota de todas las matrículas";
echo "</h2>";
$consulta7 = "
SELECT 
    a.dni,
    a.nombre,
    asg.nombre AS asignaturaN,
    m.anio,
    m.nota
FROM 
    Matriculas m
    INNER JOIN Alumnos a ON m.dni = a.dni
    INNER JOIN Asignaturas asg ON m.codigo = asg.codigo";
$resultado7 = $conexion->query($consulta7);

while ($file = $resultado7->fetch_array(MYSQLI_ASSOC)) {
    echo "DNI: $file[dni] Nombre: $file[nombre] Asignatura: $file[asignaturaN] Año: $file[anio] Nota:$file[nota]<br>";
}
echo "<h2>";
echo "8. Muestra el nombre del alumno, nombre de la asignatura y nota de los alumnos
que hayan obtenido una nota mayor o igual a 6(como se supone que relaciono  las tablas sin casilla comun ?)";
echo "</h2>";

$consulta8="select a.nombre,m.nombre,nota from alumnos a INNER JOIN matriculas m on  where nota>=6";

echo "<h2>";
echo "9. Muestra el nombre de la asignatura y nota de todas las asignaturas cursadas por
el alumno Ramón Torres.";
echo "</h2>";
//hacer join de la tabla asignatura y alumnos y matricula
$consulta9="select a.nombre,nota from asignaruras a INNER JOIN matriculas m on  where nombre='Ramon torres'";

echo "<h2>";
echo "10. Muestra el nombre y edad de todos los alumnos, ordenados de mayor a menor
edad";
echo "</h2>";
$consulta10="select a.nombre,ORDER_BY edad DSC from alumnos a INNER JOIN matriculas m on  ";

echo "<h2>";
echo "11. Muestra el nombre de la asignatura y el número de alumnos matriculados en
cada una de ellas.";
echo "</h2>";
$consulta11="select a.nombre,count() from alumnos a INNER JOIN matriculas m on  ";

echo "<h2>";
echo "12. Muestra el nombre del alumno y la nota media obtenida en todas las asignaturas
en las que esté matriculado.";
echo "</h2>";

echo "<h2>";
echo "13. Muestra el nombre de los alumnos que no han cursado ninguna asignatura en
el año 2020.
";
echo "</h2>";
echo "<h2>";
echo "14. Muestra el nombre del alumno y la nota de los alumnos que hayan cursado la
asignatura “Bases de datos” y hayan obtenido una nota igual o superior a 6.";
echo "</h2>";
echo "<h2>";
echo "15. Muestra el nombre de la asignatura y el número de alumnos matriculados de
aquellas asignaturas que tengan más de un alumno.";
echo "</h2>";
echo "<h2>";
echo "16. Muestra el nombre del alumno y el nombre de la asignatura de todos los
alumnos que estén matriculados en asignaturas del segundo trimestre.
";
echo "</h2>";
echo "<h2>";
echo "17. Muestra el nombre del alumno y el número de asignaturas en las que está
matriculado, pero solo los alumnos que tengan más de una matrícula.";
echo "</h2>";
echo "<h2>";
echo "18. Muestra el nombre de la asignatura y el número de alumnos matriculados,
incluyendo también aquellas asignaturas que no tienen ningún alumno
matriculado.";
echo "</h2>";
echo "<h2>";
echo "19. Muestra el nombre del alumno, nombre de la asignatura y nota de aquellos
alumnos que hayan obtenido la nota máxima (10) en alguna asignatura.";
echo "</h2>";
echo "<h2>";
echo "20. Muestra el nombre del alumno y su nota media, indicando solo el alumno que
tiene la nota media más alta de todos.";
echo "</h2>";
//no te olvides
$conexion->close();