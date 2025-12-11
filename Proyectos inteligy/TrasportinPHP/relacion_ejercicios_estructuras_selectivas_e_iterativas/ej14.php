
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Productos con CSS</title>
    <style>
        body {
            background-color: azure;
            padding: 1em;
            font-family: Arial, sans-serif;
        }

        .producto {
            border: 1px solid #333;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;
            width: 320px;
            background: #fff;
        }

        .nombre {
            font-weight: bold;
            font-size: 1.1em;
            margin-bottom: 6px;
        }

        .precio {
            color: #555;
            margin-bottom: 6px;
        }

        .descripcion {
            font-style: italic;
            color: #333;
        }
    </style>
</head>

<body>
<p>
    14.Define varios productos como arrays asociativos individuales y muéstralos
    con PHP en una página dentro de un < div > con clases CSS. De cada producto
    tendremos nombre, precio y descripción.

    </p><?php
// Producto 1
$producto1 = array(
        'nombre' => 'Camiseta',
        'precio' => 15.99,
        'descripcion' => 'Camiseta de algodón 100% con estampado moderno.'
);

// Producto 2
$producto2 = array(
        'nombre' => 'Zapatillas',
        'precio' => 65.50,
        'descripcion' => 'Zapatillas deportivas ligeras y cómodas.'
);

// Producto 3
$producto3 = array(
        'nombre' => 'Reloj',
        'precio' => 120.00,
        'descripcion' => 'Reloj analógico con correa de cuero.'
);

// Mostrar producto 1
echo '<div class="producto">';
echo '<div class="nombre">' . htmlspecialchars($producto1['nombre']) . '</div>';
echo '<div class="precio">Precio: $' . number_format($producto1['precio'], 2) . '</div>';
echo '<div class="descripcion">' . htmlspecialchars($producto1['descripcion']) . '</div>';
echo '</div>';

// Mostrar producto 2
echo '<div class="producto">';
echo '<div class="nombre">' . htmlspecialchars($producto2['nombre']) . '</div>';
echo '<div class="precio">Precio: $' . number_format($producto2['precio'], 2) . '</div>';
echo '<div class="descripcion">' . htmlspecialchars($producto2['descripcion']) . '</div>';
echo '</div>';

// Mostrar producto 3
echo '<div class="producto">';
echo '<div class="nombre">' . htmlspecialchars($producto3['nombre']) . '</div>';
echo '<div class="precio">Precio: $' . number_format($producto3['precio'], 2) . '</div>';
echo '<div class="descripcion">' . htmlspecialchars($producto3['descripcion']) . '</div>';
echo '</div>';
?>
</body>

</html>
