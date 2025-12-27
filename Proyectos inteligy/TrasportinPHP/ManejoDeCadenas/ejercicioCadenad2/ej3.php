<!Doctype html>
<html>
<head>
    <title>3ej</title>
    <style>
        table {
            border-collapse: collapse;
            margin-left: 35%;
            margin-top: 15%;
            border: yellowgreen solid 2px ;

        }
        th{
            text-align: left;
            background-color: yellowgreen;
            color: white;
            padding-left: 5px;
            padding-right: 5px;
        }
        td{
           padding-left: 5px;
            padding-right: 5px;

            border-bottom: yellowgreen solid 2px ;

        }

    </style>
</head>
<body>
<!--3. Se necesita comprobar que un determinado grupo de usuarios no ha utilizado en su
contraseña su propio nombre de usuario ya que no se considerarían contraseñas
correctas. Suponer que tenemos una matriz en la que cada fila contiene el nombre y la
contraseña de un usuario. La página PHP deberá mostrar un cuadro de la siguiente
forma:
Nota: Se deberán respetar los tipos de letra, colores y diseño de la tabla.
Nota1: Dará igual si el nombre que utiliza en la contraseña va con mayúsculas o
minúsculas, será igualmente inválido.
Nota2: No se podrá mostrar la contraseña de usuario, si no que se mostrará un
asterisco (*) por cada carácter que contenga la contraseña.
 -->
<?php
$usuarios = ["Nombre1&"=>"contraseña", "PEPE"=> "#Imprenta2029","Juan"=> "#@!$&?", "Señor Director"=>"señor Director"];

function nombresValidos($usuarios)
{
    $caracteres = "&!?*";
    echo "<table>";
    echo "<tr><th>USUARIO</th><th>PASSWORD</th><th></th></tr>";
    foreach ($usuarios as $usuario=> $contrasena) {
        echo "<tr>";

        echo "<td><b>$usuario</b></td>";
        echo "<td>";
        for($a=0;$a<strlen($contrasena);$a++){
         echo "*";
        }
        echo "</td>";

        if (stripos($usuario,$contrasena)!==false) {
            echo "<td style='color: red'>Incorrecto</td>";
        } else {
            echo "<td style='color: green'>Correcto</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}

nombresValidos($usuarios);
?>

</body>
</html>

