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
        <th>Número1 </th>
        <th>Número2 </th>
        <th>Suma</th>
    </tr>
    <tr>
        <?php
        $num1=10;
        $num2=5;
        echo      "<td>".$num1."</td>";
        echo      "<td>".$num2."</td>";
        echo      "<td>".$result=$num1+$num2."</td>";
        ?>
    </tr>

</table>

</body>

</html>