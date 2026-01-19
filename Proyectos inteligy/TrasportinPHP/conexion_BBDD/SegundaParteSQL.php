<?php
//Conexion
$conexion = new mysqli('localhost', 'root', '', 'centro');
//ejercicio 1
echo "<h5>Crear un formulario con un campo de texto para el DNI. Antes de realizar la
consulta, comprobar que existe un alumno con ese DNI.
Si no existe, mostrar un mensaje de error, si existe, mostrar:
 </h5>";
echo "<ul> <li>nombre y edad del alumno</li>
<li>• nombre de las asignaturas matriculadas</li>
<li>• nota obtenida en cada asignatura</li>
</ul>
";
echo "
<form action='#' method='post' enctype='multipart/form-data'>
<input name='dni' type='text' placeholder='dni' maxlength='9'>
<input name='sumit' type='submit'>
</form>
";
if (isset($_POST['sumit'])) {
    $dni = $_POST['dni'];
    $sentiencia = "select count(dni) from alumnos where dni=? ";
    $consulta1 = $conexion->prepare($sentiencia);
    $consulta1->bind_param("s", $dni);
    $consulta1->execute();
    $consulta1->bind_result($num);
    $consulta1->fetch();
    $consulta1->close();

    if ($num == 0) {
        echo "Mensajito de error tu alumno nunca a existido";
    } else {
        $consulta2 = "select 
    a.nombre as nombreAlumno
     ,a.edad as edadAlumno,
      asg.nombre as nombreAsignatura
     ,m.nota as nota
    
FROM 
    Matriculas m
    INNER JOIN Alumnos a ON m.dni = a.dni
    INNER JOIN Asignaturas asg ON m.codigo = asg.codigo
    where a.dni=?";
        $consulta = $conexion->prepare($consulta2);
        $consulta->bind_param("s", $dni);
        $consulta->execute();
        $consulta->bind_result($nombreA, $edadA, $nombreAsig, $nota);

        while ($consulta->fetch()) {
            echo "$nombreA, $edadA, $nombreAsig,$nota<br>";
        }

        $consulta->close();
    }

}
$conexion->close();