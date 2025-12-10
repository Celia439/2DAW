<!Doctype html>
<html>

<head>
    <title>Estructuras selectivas e iterativas</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: center;
        }

        th {
            background-color: #ccc;
        }

        td {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
<p>19.Codificar una página en PHP que muestre dentro de una tabla las primeras
</p>

<table>
    <tr>
        <?php
        // Mostrar encabezados con la posición
        for ($i = 1; $i <= 15; $i++) {
            echo "<th>$i</th>";
        }
        ?>
    </tr>
    <tr>
        <?php
        // Inicializar los dos primeros números de Fibonacci
        $fib1 = 0;
        $fib2 = 1;

        for ($i = 1; $i <= 15; $i++) {
            if ($i == 1) {
                echo "<td>$fib1</td>";
            } elseif ($i == 2) {
                echo "<td>$fib2</td>";
            } else {
                $fib = $fib1 + $fib2;
                echo "<td>$fib</td>";
                $fib1 = $fib2;
                $fib2 = $fib;
            }
        }
        ?>
    </tr>
</table>

</body>

</html>
