<!doctype html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 20px;
        }
        h2 {
            color: #ff4500;
        }
        .pregunta {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<h2>Ejercicio19 Examen pokemon</h2>

<form action="ej19.php" method="GET">
    <div class="pregunta">
        <p><strong>Pregunta 1:</strong> ¿Cuál es el Pokémon más famoso?</p>
        <input type="radio" name="p1" value="Pikachu" > Pikachu<br>
        <input type="radio" name="p1" value="Charmander"> Charmander<br>
        <input type="radio" name="p1" value="Squirtle"> Squirtle<br>
        <input type="radio" name="p1" value="Bulbasaur"> Bulbasaur<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 2:</strong> ¿Cuál es un Pokémon de tipo Agua?</p>
        <input type="radio" name="p2" value="Squirtle" > Squirtle<br>
        <input type="radio" name="p2" value="Charmander"> Charmander<br>
        <input type="radio" name="p2" value="Bulbasaur"> Bulbasaur<br>
        <input type="radio" name="p2" value="Pikachu"> Pikachu<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 3:</strong> ¿Qué Pokémon inicial es de tipo Planta?</p>
        <input type="radio" name="p3" value="Bulbasaur" > Bulbasaur<br>
        <input type="radio" name="p3" value="Charmander"> Charmander<br>
        <input type="radio" name="p3" value="Squirtle"> Squirtle<br>
        <input type="radio" name="p3" value="Pidgey"> Pidgey<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 4:</strong> ¿Qué Pokémon evoluciona de Magikarp?</p>
        <input type="radio" name="p4" value="Gyarados" > Gyarados<br>
        <input type="radio" name="p4" value="Eevee"> Eevee<br>
        <input type="radio" name="p4" value="Onix"> Onix<br>
        <input type="radio" name="p4" value="Snorlax"> Snorlax<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 5:</strong> ¿Cuál es el Pokémon legendario psíquico de la primera generación?</p>
        <input type="radio" name="p5" value="Mewtwo" > Mewtwo<br>
        <input type="radio" name="p5" value="Mew"> Mew<br>
        <input type="radio" name="p5" value="Zapdos"> Zapdos<br>
        <input type="radio" name="p5" value="Articuno"> Articuno<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 6:</strong> ¿Qué tipo es Charmander?</p>
        <input type="radio" name="p6" value="Fuego" > Fuego<br>
        <input type="radio" name="p6" value="Agua"> Agua<br>
        <input type="radio" name="p6" value="Planta"> Planta<br>
        <input type="radio" name="p6" value="Eléctrico"> Eléctrico<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 7:</strong> ¿Cuál Pokémon tiene múltiples evoluciones dependiendo de piedra o amistad?</p>
        <input type="radio" name="p7" value="Eevee" > Eevee<br>
        <input type="radio" name="p7" value="Pikachu"> Pikachu<br>
        <input type="radio" name="p7" value="Mew"> Mew<br>
        <input type="radio" name="p7" value="Jigglypuff"> Jigglypuff<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 8:</strong> ¿Qué Pokémon tiene tipo Agua y Volador?</p>
        <input type="radio" name="p8" value="Gyarados" > Gyarados<br>
        <input type="radio" name="p8" value="Squirtle"> Squirtle<br>
        <input type="radio" name="p8" value="Pidgey"> Pidgey<br>
        <input type="radio" name="p8" value="Magikarp"> Magikarp<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 9:</strong> ¿Cuál Pokémon es legendario de tipo hielo y ave?</p>
        <input type="radio" name="p9" value="Articuno" > Articuno<br>
        <input type="radio" name="p9" value="Zapdos"> Zapdos<br>
        <input type="radio" name="p9" value="Moltres"> Moltres<br>
        <input type="radio" name="p9" value="Mewtwo"> Mewtwo<br>
    </div>

    <div class="pregunta">
        <p><strong>Pregunta 10:</strong> ¿Qué Pokémon es de tipo Dragón y evoluciona de Bagon?</p>
        <input type="radio" name="p10" value="Salamence" > Salamence<br>
        <input type="radio" name="p10" value="Dragonite"> Dragonite<br>
        <input type="radio" name="p10" value="Garchomp"> Garchomp<br>
        <input type="radio" name="p10" value="Flygon"> Flygon<br>
    </div>

    <input type="submit" value="Enviar respuestas">
</form>
<?php
//19. Programar una página en HTML – PHP que a través de formularios realice al
//usuario en examen tipo test. El test tendrá 10 preguntas de múltiple opción del
//tema que se quiera. Una vez que el usuario envíe sus respuestas, la página debe
//decirle, la nota que ha obtenido y las respuestas correctas a las preguntas en las
//que se equivocó. añadir check bocx y select (option) (text)
// Array con las preguntas
    $respuestasCorrectas = [
            'p1' => 'Pikachu',
            'p2' => 'Squirtle',
            'p3' => 'Bulbasaur',
            'p4' => 'Gyarados',
            'p5' => 'Mewtwo',
            'p6' => 'Fuego',
            'p7' => 'Eevee',
            'p8' => 'Gyarados',
            'p9' => 'Articuno',
            'p10'=> 'Salamence'
    ];

    $nota = 0;
    $errores = [];

    foreach ($respuestasCorrectas as $clave => $correcta) {
        $usuario = $_GET[$clave];
        if ($usuario === $correcta) {
            $nota++;
        } else {
            $errores[$clave] = ['usuario' => $usuario, 'correcta' => $correcta];
        }
    }

    echo "<h2>Resultados del examen Pokémon</h2>";
    echo "<p>Tu nota: <strong>$nota / 10</strong></p>";

    if (!empty($errores)) {
        echo "<h3>Respuestas incorrectas:</h3>";
        foreach ($errores as $num => $res) {
            echo "<p>Pregunta $num: tu respuesta: <strong>{$res['usuario']}</strong> | Correcta: <strong>{$res['correcta']}</strong></p>";
        }
    } else {
        echo "<p>¡Felicidades! Todas tus respuestas son correctas.</p>";
    }

?>
</body>
</html>