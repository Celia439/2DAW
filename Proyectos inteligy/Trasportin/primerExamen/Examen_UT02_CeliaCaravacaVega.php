<doctype html>
    <html>
    <head>
        <style>
            table {
                border-collapse: collapse;
                background-color: lightgray;
            }

            th {
                background-color: grey;
            }

            td {
                background-color: lightgray;
            }
        </style>
    </head>
    <body>
    <?php
    // datos del festival dias escenarios correspondientes con sus actuaciones correspondientes
    $festival = [
            'viernes' => [
                    'escenarioPrimcipal' => [
                            'actuacion1' => ['nombre' => 'jousi', 'horaActuacion' => '5:00', 'numAsiste' => 50, 'generoMusic' => 'pop'],
                            'actuacion2' => ['nombre' => 'aljo', 'horaActuacion' => '6:00', 'numAsiste' => mt_rand(0, 6000), 'generoMusic' => 'pop-rock']
                    ],
                    'escenarioAlternativo' => [
                            'actuacion3' => ['nombre' => 'lepe', 'horaActuacion' => '9:00', 'numAsiste' => mt_rand(0, 6000), 'generoMusic' => 'popAlternativo'],
                            'actuacion4' => ['nombre' => 'pera', 'horaActuacion' => '4:00', 'numAsiste' => mt_rand(0, 6000), 'generoMusic' => 'rock'],
                            'actuacion5' => ['nombre' => 'antonio', 'horaActuacion' => '2:00', 'numAsiste' => mt_rand(0, 6000), 'generoMusic' => 'metal'],
                    ]
            ],
            'sabado' => [
                    'escenarioAlternativo' => [
                            'actuacion6' => ['nombre' => 'lepe', 'horaActuacion' => '9:00', 'numAsiste' => mt_rand(0, 60), 'generoMusic' => 'popAlternativo'],
                            'actuacion7' => ['nombre' => 'pera', 'horaActuacion' => '4:00', 'numAsiste' => mt_rand(0, 60), 'generoMusic' => 'rock'],
                            'actuacion8' => ['nombre' => 'antonio', 'horaActuacion' => '2:00', 'numAsiste' => mt_rand(0, 60), 'generoMusic' => 'metal'],
                    ]
            ],
            'domingo' => [
                    'escenarioPrimcipal' => [
                            'actuacion9' => ['nombre' => 'michelJacson', 'horaActuacion' => '1:00', 'numAsiste' => mt_rand(0, 60), 'generoMusic' => 'metal'],
                            'actuacion10' => ['nombre' => 'him', 'horaActuacion' => '3:00', 'numAsiste' => mt_rand(0, 60), 'generoMusic' => 'rock']
                    ],
            ]
    ];
    //2)
    $mayorAsistencia = 0;
    $diaMA = '';
    $escenarioMA = '';
    $artistaMA = '';
    //1)en una tabla html muestra toda actuacion del festival por día (debajo de cada tabla total de asisentes por dia )(al final dia mayor asistencia)
    echo "<table>";
    echo "<tr>";
echo "<th>Dia</th>";
echo "<th>Escenario</th>";
echo "<th>actuacion</th>";
echo "<th>artista</th>";
echo "<th>hora</th>";
echo "<th>genero</th>";
echo "<th>asistentes</th>";
echo "</tr>";
    foreach ($festival as $dia => $escenarios) {
        echo "<tr>";
        echo "<td>$dia</td>";
        echo "</tr>";
        foreach ($escenarios as $escenario => $datosActuacion) {
            echo "<tr>";
            echo "<td></td>";
            echo "<td>$escenario</td>";
            echo "</tr>";

            foreach ($datosActuacion as $actutacion => $datos) {
                echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>$actutacion</td>";
                echo "<td>" . $datos['nombre'] . "<td>";
                echo "<td>" . $datos['horaActuacion'] . "<td>";
                echo "<td>" . $datos['generoMusic'] . "<td>";
                echo "<td>" . $datos['numAsiste'] . "<td>";
                //comprovar mayor asistencia
                if ($mayorAsistencia < $datos['numAsiste']) {
                    $mayorAsistencia = $datos['numAsiste'];
                    $artistaMA = $datos['nombre'];
                    $diaMA = $dia;
                    $escenarioMA = $escenario;
                }
                echo "</tr>";
            }
        }
    }
    echo "</table>";
    //2) (artista con mas asistencia y mostrar dia escenario genero)
    echo "<p>2)El artista con mayor asistencia fue $artistaMA el $diaMA en el escenario $escenarioMA</p>";
    //3)tabla por genero musical (número de actuaciones, asistentes totales y media de asistentes por actuación. )

    //4)total actuaciones y musicos sin repetir
    function totalActuacionesYartistas($festival)
    {
        $totalAcuaciones = 0;
        $artistas = [];
        foreach ($festival as $dia => $escenarios) {
            foreach ($escenarios as $escenario => $datosActuacion) {
                foreach ($datosActuacion as $actutacion => $datos) {
                    $totalAcuaciones++;
                    if (!in_array($datos['nombre'], $artistas)) {
                        $artistas[] = $datos['nombre'];
                    }
                }

            }
        }
        echo "<p>4)el numero total de acutaciones es $totalAcuaciones</p>";
        echo "Todos los artistas que han participado:";
        foreach ($artistas as $artista) {
            echo " $artista ";
        }
        echo ". <br>";
    }

    totalActuacionesYartistas($festival);
    //5) a partir del nombre de un artistas dar sus datos
    function buscarArtista($artista, $festival)
    {
        $artistaEncontrado = false;
        foreach ($festival as $dia => $escenarios) {
            foreach ($escenarios as $escenario => $datosActuacion) {
                foreach ($datosActuacion as $actutacion => $datos) {
                    if ($datos['nombre'] === $artista) {
                        $artistaEncontrado=true;
                        echo "$dia";
                        echo ", $escenario, ";
                        echo $datos['horaActuacion'].", ";
                        echo $datos['generoMusic'].", ";
                        echo $datos['numAsiste'].". <br>";

                    }
                }

            }
        }
        if(!$artistaEncontrado){
           echo "El artista $artista no se encuentra en el festival";
        }
    }
    echo "<p>5) artista encontrado y no encontrado</p>";
    echo "artista lepe<br>";
    buscarArtista('lepe', $festival);
    echo "artista celia<br>";
    buscarArtista('Celia', $festival);
    //6 Mostar total de asistencia y hacer la media por actuacion
    function totalAsistencia($festival)
    {
        $asistenciaTotal = 0;
        foreach ($festival as $dia => $escenarios) {
            foreach ($escenarios as $escenario => $datosActuacion) {
                foreach ($datosActuacion as $actutacion => $datos) {
                    $asistenciaTotal += $datos['numAsiste'];
                }

            }
        }
        return $asistenciaTotal;
    }

    $total = totalAsistencia($festival);
    echo "<p>6) Total asistencia" . $total . "</p>";
    foreach ($festival as $dia => $escenarios) {
        foreach ($escenarios as $escenario => $datosActuacion) {
            foreach ($datosActuacion as $actutacion => $datos) {
                echo "<p> La media de la aistencia de la $actutacion es " . ($datos['numAsiste'] / $total);
            }

        }
    }

    //7)lista de los artistas que superan 1000 asistentes de mayor a menor
    function artistaMasDMillAsistencia($festival)
    {
        $artistas = [];
        foreach ($festival as $dia => $escenarios) {
            foreach ($escenarios as $escenario => $datosActuacion) {
                foreach ($datosActuacion as $actutacion => $datos) {
                    if ($datos['numAsiste'] > 1000) {
                        $artistas[] = $datos['nombre'];
                        $artistas[] = $datos['numAsiste'];
                    }
                }

            }
        }
        echo "<p>7)Artistas con asistencia mayor a 1000</p>";
        echo "<ul>";
        foreach ($artistas as $nombreAsictencia) {
            echo "<li>" . $nombreAsictencia . "</li>";

        }
        echo "</ul>";

    }

    artistaMasDMillAsistencia($festival);

    //8) de un dia concreto mostrar escenario  ordenado por numero de asistentes
    /**
     * function mostrarEscenarioOrdenadoPorAsistencia($festival, $dia = 'lunes')
     * {
     * //? asort($festival[$dia]['escenarioPrimcipal']['actuacion9']['numAsiste']);
     * foreach ($festival as $dia => $escenarios) {
     * foreach ($escenarios as $escenario => $datosActuacion) {
     * echo "$escenario ";
     * foreach ($datosActuacion as $actutacion => $datos) {
     * echo $datos['numAsiste'];
     * }
     *
     * }
     *
     * }
     * }
     *
     * mostrarEscenarioOrdenadoPorAsistencia($festival);
     */
    //9)

    ?>
    </body>
    </html>
