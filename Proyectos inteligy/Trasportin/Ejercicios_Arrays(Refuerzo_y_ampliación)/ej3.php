
<!Doctype html>
<html>

<head>
    <title>ej3</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
        }
        table {
            margin-top: 2em;
            margin-left: 15%;
            background-color: palevioletred;
            border-collapse: collapse;
        }

        th {
            background-color: palevioletred;
            padding: 1em;
            border: papayawhip dashed 2px;
            color: white;


        }

        td {
            background-color: pink;
            text-align: center;
            border: papayawhip solid 2px;
            padding: 3px;
        }
    </style>
</head>

<body>
<?php
//funciones
function importeTotal($producto)
{
    $impuestos=10;
    $descuento=9;
$importe_Total= ($producto['precio_unitario']* $producto['cantidad'])+$impuestos-$descuento;
return $importe_Total;
}
function valorTotalInventario($productos)
{
    $cantidad = 0;
    $precio = 0;
    foreach ($productos as $producto) {
        $cantidad += $producto['cantidad'];
        $precio += $producto['precio_unitario'];
    }
    echo "<br>---El valor total del inventario es ".($precio*$cantidad)."€---<br>";
}
function mayorStock($productos)
{
    $nombre="";
$masStock=-1;
foreach ($productos as $producto){
    if($producto['cantidad']>$masStock){
        $masStock=$producto['cantidad'];
        $nombre=$producto['nombre'];
    }
}
    echo "<br>---El producto con más stock es '$nombre' con $masStock---<br>";
}

// crear un array de array asociativo con codigo nombre cantidad y precio unitario
$productos=[
        ['codigo'=>000,'nombre'=>'bolsa_de_canicas','cantidad'=>mt_rand(0,10),'precio_unitario'=>1.5],
        ['codigo'=>001,'nombre'=>'libro(programacion_desde_cero)','cantidad'=>mt_rand(0,10),'precio_unitario'=>8],
        ['codigo'=>002,'nombre'=>'fregona','cantidad'=>mt_rand(0,10),'precio_unitario'=>14.99],
        ['codigo'=>003,'nombre'=>'tele','cantidad'=>mt_rand(0,10),'precio_unitario'=>80]

];

//a)  crar una tabla y meter todos los productos (calcula la ultima columna)
?>
<table>
    <tr>
    <th>codigo</th>
    <th>nombre</th>
    <th>cantidad</th>
    <th>precio unitario</th>
    <th>importe total por producto</th>
    </tr>
    <?php
    foreach ($productos as $producto){
        echo "<tr>";
        echo "<td>".$producto['codigo']."</td>";
        echo "<td>".$producto['nombre']."</td>";
        echo "<td>".$producto['cantidad']."</td>";
        echo "<td>".$producto['precio_unitario']."</td>";
        echo "<td>".$producto['importe total'] =importeTotal($producto) ."</td>";
        echo "<tr>";
    }
    ?>
</table>
<?php
//b) cuanto cuesta el inventario $valorTotal+= cantidad * precio;
valorTotalInventario($productos);
//c) pillar el indice del del producto con más stock y sacarle el nombre
mayorStock($productos);
?>
</body>

</html>
