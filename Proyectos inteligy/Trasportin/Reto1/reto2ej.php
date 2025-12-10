

<!doctype html>
<html>
<head>
    <title>reto1</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td, th {
            padding: 1em;
            border: green dashed 3px;
        }
    </style>
</head>
<body>
<?php
$alumnos = [
    'jose' => [
        'dwes' => ["nota_final" => 0, "num_faltas" => 100],
        'dwec' => ["nota_final" => 6.5, "num_faltas" => 5],
        'diw' => ["nota_final" => 7.8, "num_faltas" => 2],
        'emp' => ["nota_final" => 9.0, "num_faltas" => 0],
    ],
    'maria' => [
        'dwes' => ["nota_final" => 8.7, "num_faltas" => 1],
        'dwec' => ["nota_final" => 7.3, "num_faltas" => 3],
        'diw' => ["nota_final" => 9.5, "num_faltas" => 0],
        'emp' => ["nota_final" => 6.0, "num_faltas" => 4],
    ],
    'ana' => [
        'dwes' => ["nota_final" => 5.4, "num_faltas" => 10],
        'dwec' => ["nota_final" => 4.8, "num_faltas" => 7],
        'diw' => ["nota_final" => 6.2, "num_faltas" => 3],
        'emp' => ["nota_final" => 8.1, "num_faltas" => 1],
    ]
];
$asignaturas=[];
foreach ($alumnos as $asignatura => $notaYfaltas){
    $asignatura[]=$asignatura;
    foreach ($notaYfaltas as $nota =>$dalta){

    }
}
?>
</body>
</html>