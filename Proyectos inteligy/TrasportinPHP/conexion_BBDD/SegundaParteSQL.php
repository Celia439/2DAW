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
        $sentiencia2 = "
SELECT 
    a.nombre AS nombreAlumno,
    a.edad AS edadAlumno,
    asg.nombre AS nombreAsignatura,
    m.nota AS nota
FROM Matriculas m
INNER JOIN Alumnos a ON m.dni = a.dni
INNER JOIN Asignaturas asg ON m.codigo = asg.codigo
WHERE m.dni = ?;

    ";
        $consulta2 = $conexion->prepare($sentiencia2);
        $consulta2->bind_param("s", $dni);
        $consulta2->execute();
        $consulta2->bind_result($nombreA, $edadA, $nombreAsig, $nota);

        while ($consulta2->fetch()) {
            echo "$nombreA, $edadA, $nombreAsig,$nota<br>";
        }

        $consulta2->close();
    }

}
//ejercicio 2
echo "<h5>Crear un formulario con un desplegable para seleccionar el trimestre (1 o 2).
Mostrar:
 </h5>";
echo "<ul> <li>Alumnos que tengan más de una matrícula en asignaturas del trimestre
seleccionado</li>
<li>•número de asignaturas</li>
<li>•nota media obtenida</li>
</ul>
";
echo "<form action='#' method='post' enctype='multipart/form-data'>
<select name='trimestre'>
<option value='1'>1</option>
<option value='2'>2</option>
</select>
<input name='enviar' type='submit'>
</form>";
if (isset($_POST["enviar"])) {
    $trimestre = $_POST['trimestre'];
        $sentiencia2 = "
select
    a.nombre,
    count(asg.nombre),
    AVG(m.nota)
from matriculas m 
INNER JOIN Alumnos a ON m.dni = a.dni
INNER JOIN Asignaturas asg ON m.codigo = asg.codigo
WHERE asg.trimestre=?
group by m.dni
having  count(m.codigo)>1
";
        $consulta2 = $conexion->prepare($sentiencia2);
        $consulta2->bind_param("i", $trimestre);
        $consulta2->execute();
        $consulta2->bind_result($nombre, $notaC, $notaM);
        while ($consulta2->fetch()) {
            echo "$nombre,Asignaturas: $notaC, nota media: $notaM<br>";

        }
        $consulta2->close();

}
//Ejercicio 3
echo "<h5>Crear un formulario con un campo de texto para introducir una cadena de
búsqueda. Mostrar</h5>
<ul>
<li>• nombre del alumno</li>
<li>• nombre de la asignatura</li>
<li>• Nota</li>
</ul>
<h6>Solo se mostrarán los alumnos cuyo nombre contenga la cadena introducida y que
tengan alguna nota superior a 5. Además, ordenar los resultados por nombre y nota.
</h6>
";

echo "<form action='#' method='post' enctype='multipart/form-data'>
<input name='cBusqueda' type='text' placeholder='Cadena de busqueda' >
<input name='enviar3' type='submit' value='enviar'>
</form>";
if(isset($_POST["enviar3"])){
    $cBusqueda=$_POST["cBusqueda"];
    $sentencia="
    select 
        a.nombre,
        asg.nombre,
        m.nota
    from matriculas m
    inner join asignaturas asg on m.codigo=asg.codigo
    inner join  alumnos a on m.dni=a.dni
    where a.nombre like ?  and m.nota>5 
    GROUP by a.nombre
    order by a.nombre and m.nota
    ";
    $consulta= $conexion->prepare($sentencia);
    //Me da error hay y es por que no se debe poner '' en la sentencia sql
    $cBusqueda = "%".$cBusqueda."%";
    $consulta->bind_param('s',$cBusqueda);
    $consulta->execute();
    $consulta->bind_result($nombreAl,$nombreAsg,$nota);
    while($consulta->fetch()){
        echo "$nombreAl ,$nombreAsg, $nota";
    }
}
//ejercicio 4
echo "<h5>
Crear un formulario con un campo de texto para el DNI. Comprobar que existe un
alumno con ese DNI. Preparar una consulta y ejecutarla cada vez que se envíe el
formulario, sin volver a preparar la sentencia.Mostrar:</h5>
<ul>
<li>•  nombre del alumno</li>
<li>• asignaturas</li>
<li>• Nota</li>
</ul>
";
echo "<form action='#' method='post' enctype='multipart/form-data'>
<input type='text' placeholder='dni' name='dni'/>
<input type='submit' value='enviar' name='enviar'/>
</form>";

//primero se envio el formulario
if(isset($_POST["enviar"])){
//pillar el dni
    $dni=$_POST["dni"];
    //comprobar si existe
    $sentenciaC="select count(dni) from alumnos where dni=?";
    $consulta=$conexion->prepare($sentenciaC);
    $consulta->bind_param("s",$dni);
    $consulta->execute();
    $consulta->bind_result($num);
    $consulta->close();
    if($num=0){
        echo "Tu dni no está registrado";
    }else{
    $sentenciaM="
    select 
        a.nombre
        ,asg.nombre
        ,m.nota 
    from matricula m 
    inner join asignaturas asg on m.codigo =asg.codigo
    inner join  ";
    }

}


$conexion->close();