<?php
include_once ("./Evento.php");
//- *Que no accedas a ninguna página interna sin estar registrado
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

//- *una pag de logout que destruya la session
?>
<h1>Panel principal</h1>
<p>Bienvenida <?php echo $_SESSION["usuario"]; ?></p>

<a href="logOut.php">Cerrar sesión</a>
<?php
//--Panel principal donde mostrar eventos de usuario

//- *Que puede hacer un usuario aqui(
//      Crear evento
//      ,Editar evento
//      ,EliminarEvento
//      listar eventos en labla html ordenada por fecha y hora)
?>
<form class="panel principal" method="post" enctype="multipart/form-data" action="#">

    <input name="titulo" type="text" placeholder="Titulo"/>
    <input name="descripcion" type="text" placeholder="Descripción"/>
    <input name="fecha" type="date"/>
    <input name="hora" type="time"/>
    <input name="categoria"/>
    <input type="submit" name="crear" value="crear">
    <input type="submit" name="editar" value="editar">
    <input type="submit" name="borrar" value="borrar">

</form>


<?php

//--CRUD de eventos(No admitir fecha pasadas ojo)
//Creo la tabla evento previamente
//    CREATE TABLE if NOT EXISTS eventos(
//    	titulo varchar(20),
//        descripcion Text,
//        fecha date,
//        hora time,
//        categoria varchar(50)
//    );
//
if (isset($_POST["crear"])) {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $categoria = $_POST["categoria"];
    $fechaA=explode("-",$fecha);
    //Validación de la fecha (todo implementa que si es  pasada es malo)
    if(checkdate("$fechaA[1]","$fechaA[2]","$fechaA[0]")){
        echo "<p>Fecha good</p>";
        echo "<p>Te lo meto en la bd rey</p>";
        $conexion=new mysqli("localhost","root","","agendaPersonal");
        $sentencia="insert into eventos values(?,?,?,?,?)";
        $consulta=$conexion->prepare($sentencia);
        $consulta->bind_param("sssss",$titulo,$descripcion,$fecha,$hora,$categoria);
        $consulta->execute();

        echo "<p>Ea listo</p>";
    }else{
        echo "<p>Fecha no good :(</p>";
    }
}

//--Recordatorios basado en cookies avisa el más cercano

//- * Al iniciar sesion:
//      -_Comprobar si usuario tiene evento en 24h
//      -   _True:Crear cookie recordatorio=1 que se valida hasta hasta la hora de fin
//      -   _While la cookie existe mostrar “Tienes eventos próximos en las próximas 24 horas.”
//- * Al iniciar supongo en general tenemos que hacer una instancia del  tiempo real  y
//  -_Comparamos fecha y hora con eventos  y mostrar mensaje faltan 3 horas o dos dias


//--vista semanal generada por array multidimensionales


//al realizar este punto cargar todos los eventos guardados en la base de datos

//      listar eventos en labla html ordenada por fecha y hora

//Creamos un array de objetos eventos  ordenado por fecha y hora antes de mostrar

//UNA VEZ TERMINAS ESTA REALIZAS LA OTRA FORMA ARRAY MULTIDIMENSIONAL VISTA SEMANAL
//DE LUNES A DOMINGO FRANJAS HORARIAS  REPRESENTACION DESDE UN ARRAY $AGENDAsEMANA[DIA][HORA]=EVENTO /NULL Y SE MUESTRA EN HTML TABLA CALENDARIO
//POR ULTIMO (FILTRO POR CATEGORIA)
//BUSCADOR DE EVENTO POR TEXTO
//VISTA MENSUAL?
//AÑADIR CHECK CON EVENTOS IMPORTANTES
//EXPORTARLOS A UN JSON
?>

