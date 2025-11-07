<!DOCTYPE html>
<html lang="">
<head>
    <title>bucle</title>
</head>
<body>
<?php
$num = array(1, 5, 8, 7, 6, 2, 4, 6, 4);
$numMasPequeno = 100;
foreach ($num as $numAct) {
    if ($numAct < $numMasPequeno) {
        $numMasPequeno = $numAct;
    }
}
echo $numMasPequeno;
?>
</body>
</html>

