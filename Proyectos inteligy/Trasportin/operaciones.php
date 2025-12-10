<!Doctype html>
<html>

<head>
    <title>Suma</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }

        table {
            margin: 1em;
            border: 1px black solid;
            background-color: red;
            color: white;
            font-family: monospace;
            border-collapse: collapse;

        }

        td {
            border: 1px black solid;
            padding: 1em;
            background-color: rgb(255, 182, 182);
            color: black;
        }

        th {
            border: 1px black solid;
            padding: 1em;
        }
    </style>
</head>

<body>
<table>
    <tr>
        <th>Operación</th>
        <th>Resultado</th>
        <th>Operación</th>
        <th>Resultado</th>
    </tr>
    <tr>
        <?php
        $num1=25;
        $num2=13;
        echo      "<td>".$num1."+".$num2."</td>";
        echo      "<td>".$suma=$num1+$num2."</td>";
        echo      "<td>".$num1."*".$num2."</td>";
        echo      "<td>".$mul=$num1*$num2."</td>";
        ?>
    </tr>
    <tr>
        <?php
        echo      "<td>".$num1."-".$num2."</td>";
        echo      "<td>".$rest=$num1-$num2."</td>";
        echo      "<td>".$num1."/".$num2."</td>";
        echo      "<td>".$div=$num1/$num2."</td>";
        ?>
    </tr>
</table>

</body>

</html>