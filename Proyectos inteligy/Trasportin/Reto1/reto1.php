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
//Almacen del supermercado "La Cesta de Barbate"
//Datos

//Almacen: tenemos las secciones (Refrescos, panadería, lacteos)
// Dentro de las secciones tenemos dos estanterias con 3 productos
// del producto se almacena (nombre, cantidad disponible ).
$almacen = [
        'panaderia' => [
                [
                        ['nombre' => 'pan', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'bollo', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'bizcocho', 'cantidad' => mt_rand(0, 10)]
                ],
                [
                        ['nombre' => 'empanada', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'donut', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'concha', 'cantidad' => mt_rand(0, 10)]
                ]
        ],
        'refrescos' => [
                [
                        ['nombre' => 'fanta', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'coca cola', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'nestea', 'cantidad' => mt_rand(0, 10)]
                ],
                [
                        ['nombre' => 'te', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'isotonica', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'energetica', 'cantidad' => mt_rand(0, 10)]
                ]
        ],
        'lacteos' => [
                [
                        ['nombre' => 'yogur', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'manteca', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'lacteo1', 'cantidad' => mt_rand(0, 10)]
                ],
                [
                        ['nombre' => 'lacteo2', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'lacteo3', 'cantidad' => mt_rand(0, 10)],
                        ['nombre' => 'lacteo4', 'cantidad' => mt_rand(0, 10)]
                ]
        ]
];
// Ventas de una semana en el supermercado
//  Producto (nombre de producto, precio unitario, unidades vendidas).
$ventasUnaSemana = [
        'lunes' => [
                ['nombre' => 'lacteo2', 'precio unitario' => 2.50, 'unidades vendidas' => mt_rand(0, 10)],
                ['nombre' => 'pan', 'precio unitario' => 8.99, 'unidades vendidas' => mt_rand(0, 10)],
                ['nombre' => 'bocata', 'precio unitario' => 8.99, 'unidades vendidas' => mt_rand(0, 10)]
        ],
        'martes' => [
                ['nombre' => 'yogur', 'precio unitario' => 4.99, 'unidades vendidas' => mt_rand(0, 10)],
                ['nombre' => 'lacteo3', 'precio unitario' => 7.99, 'unidades vendidas' => mt_rand(0, 10)],
                ['nombre' => 'manteca', 'precio unitario' => 0.99, 'unidades vendidas' => mt_rand(0, 10)]
        ],
        'miercoles' => [
                ['nombre' => 'te', 'precio unitario' => 9.99, 'unidades vendidas' => mt_rand(0, 10)],
                ['nombre' => 'manteca', 'precio unitario' => 0.99, 'unidades vendidas' => mt_rand(0, 10)],
                ['nombre' => 'lacteo3', 'precio unitario' => 7.99, 'unidades vendidas' => mt_rand(0, 10)]
        ],
        'jueves' => [
                ['nombre' => 'yogur', 'precio unitario' => 4.99, 'unidades vendidas' => mt_rand(0, 10)]
        ],
        'viernes' => [
                ['nombre' => 'pan', 'precio unitario' => 8.99, 'unidades vendidas' => mt_rand(0, 10)]
        ],
        'sabado' => [
                ['nombre' => 'yogur', 'precio unitario' => 4.99, 'unidades vendidas' => mt_rand(0, 10)]
        ],
        'domingo' => [
                ['nombre' => 'te', 'precio unitario' => 9.99, 'unidades vendidas' => mt_rand(0, 10)],
                ['nombre' => 'donut', 'precio unitario' => 66.99, 'unidades vendidas' => mt_rand(0, 10)]
        ]];


//Registros y analisis de ventas

//1 mostrar en una tabla ventar por dia( nombre producto, precio, unidades, total por producto)
echo "<table>";
echo "<tr>";
echo "<th>Día</th>";
echo "<th>Producto</th>";
echo "<th>Precio Unitario</th>";
echo "<th>Unidades vendidas</th>";
echo "<th>Total vendido</th>";
echo "</tr>";
// para saber el total facturado por dia
$totalFacturado = 0;
//para saber cual es el mayor facturado
$mayorFacturacion = 0;
$diaMasFacturado = "";
// recorrer cada dia
foreach ($ventasUnaSemana as $dia => $productosVendidos) {
    $totalFacturado = 0;
    echo "<tr>";
    echo "<th>$dia</th>";
    echo "</tr>";
// recorrer productos de cada dia
    foreach ($productosVendidos as $producto) {
        echo "<tr>";
        echo "<td></td>";
        echo "<td>" . $producto['nombre'] . "</td>";
        echo "<td>" . $producto['precio unitario'] . "€</td>";
        echo "<td>" . $producto['unidades vendidas'] . "</td>";
        echo "<td>" . ($producto['precio unitario'] * $producto['unidades vendidas']) . "€</td>";
        echo "</tr>";
        $totalFacturado += ($producto['precio unitario'] * $producto['unidades vendidas']);
    }
//2 Calcular cuanto han vendido por dia y mostrarlo en cada tabla?
    echo "<tr><td>Total Facturado</td><td>$totalFacturado €</td></tr>";

    //comprobar el mayor facturado
    if ($mayorFacturacion <= $totalFacturado) {
        $mayorFacturacion = $totalFacturado;
        $diaMasFacturado = $dia;
    }
    // restaurarlo para el siguiente día
}
echo "</table>";


//3 mostrar día de mayor facturacion
echo "El dia con mayor facturación es el $diaMasFacturado";

//Evaluación del almacen
//7 mostrar por seccion y estanteria orden
$almacenAux = $almacen;
ksort($almacenAux);
//9
$nombreProductoMayorStock = "";
$productoMayorCantidad = 0;


echo "<table>";

echo "<tr>";
echo "<th>Seccion</th><th>Nombre</th><th>Cantidad</th>";
echo "</tr>";
$totalProductoPorSeccion = 0;
foreach ($almacen as $seccion => $estanteria) {
    echo "<tr>";
    echo "<th>" . $seccion . "</th>";
    echo "</tr>";
    foreach ($estanteria as $productos) {
        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td></td>";
            echo "<td>" . $producto['nombre'] . "</td>";
            echo "<td>" . $producto['cantidad'] . "</td>";
            echo "</tr>";
            $totalProductoPorSeccion++;
            if ($producto['cantidad'] >= $productoMayorCantidad) {
                $nombreProductoMayorStock = $producto['nombre'];
                $productoMayorCantidad = $producto['cantidad'];
            }

        }
        //8 cuantos productos por seccion
        echo "<tr><th>Total Productos Por Seccion :</th><td>$totalProductoPorSeccion</td></tr>";
    }
    $totalProductoPorSeccion = 0;
}
// 9)mostrar producto con mayor cantidad
echo "<tr><th>Producto con mayor cantidad: </th><td>$nombreProductoMayorStock</td></tr>";
echo "</table>";


//13 comprobar de que algun producto vendido en la semana no este en el almacen
/**
 * Esta fucnion devuelve el nombre de los productos que se han vendido y no estan en el almacen
 * en el caso de no encontrar ninguno devuelve -1;
 */
function buscarProductoNoAlmacen($almacen, $ventas): array|int
{
    // recopilamos los nombres de los productos vendidos
    $nombresProductosVendidos = [];

    foreach ($ventas as $dia => $productosVendidos) {
        // recorrer productos de cada dia
        foreach ($productosVendidos as $producto) {
            if (!in_array($producto['nombre'], $nombresProductosVendidos, true)) {
                $nombresProductosVendidos[] = $producto['nombre'];
            }

        }
    }
    foreach ($almacen as $categoria => $estanterias) {
        foreach ($estanterias as $productos) {
            foreach ($productos as $producto) {
                $clave = array_search($producto['nombre'], $nombresProductosVendidos, true);
                if ($clave!==false) {
                    unset($nombresProductosVendidos[$clave]);
                }
            }
        }

    }

    // devolver lo que corresponde
    if (empty($nombresProductosVendidos)) {
        return -1;
    } else {
        return $nombresProductosVendidos;
    }
}

$resultado = buscarProductoNoAlmacen($almacen, $ventasUnaSemana);
foreach ($resultado as $a) {
    echo $a;
}

//14
//15


?>
</body>
</html>