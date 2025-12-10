<!DOCTYPE html>
<html>
<head>
    <title>Condicionales</title>
</head>
<body>
<?php
$hoyEs = date("N");
switch ($hoyEs) {
    case 1:
        echo "hoy es lunes";
        break;
    case 2:
        echo "hoy es martes";
        break;
    case 3:
        echo "hoy es miércoles";
        break;
    case 4:
        echo "hoy es jueves";
        break;
    case 5:
        echo "hoy es viernes";
        break;
    case 6:
        echo "hoy es sábado";
        break;
    case 7:
        echo "hoy es domingo";
        break;
    default:
        echo "ha ocurrido un error al consultar el día";
        break;
}
?>

</body>
</html>
