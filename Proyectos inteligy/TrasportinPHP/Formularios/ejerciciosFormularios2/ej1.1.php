<?php
if(isset($_POST["nombre"],$_POST["edad"])&&is_numeric($_POST["edad"])){
    $nombre=$_POST["nombre"];
    $edad=$_POST["edad"];
    echo "<p> Bienbenido $nombre de  $edad años</p>";

}
?>