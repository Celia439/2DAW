<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/redis.php';

// =========================
// MÉTRICAS
// =========================

// Número de peticiones (contador en Redis)
$redis->incr("monitor:requests");
$requests = $redis->get("monitor:requests");

// Tiempo de respuesta (simulado)
$start = microtime(true);

// Estado de servicios
$services = [
    "MySQL" => $pdo ? "OK" : "ERROR",
    "Redis" => $redis->ping() === "+PONG" ? "OK" : "ERROR",
    "Frontend" => "OK",
    "Nginx" => "OK"
];

// Uso de caché
$cacheHits = $redis->get("cache:hits") ?? 0;
$cacheMiss = $redis->get("cache:miss") ?? 0;

// Tiempo de respuesta real
$responseTime = round((microtime(true) - $start) * 1000, 2);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Monitor del Sistema</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .ok { color: green; }
        .error { color: red; }
    </style>
</head>
<body>

<h1> Monitor del Sistema</h1>

<h2>1. Número de peticiones</h2>
<p><strong><?= $requests ?></strong> peticiones registradas</p>

<h2>2. Tiempo de respuesta</h2>
<p><strong><?= $responseTime ?> ms</strong></p>

<h2>3. Estado de los servicios</h2>
<ul>
<?php foreach ($services as $name => $status): ?>
    <li><?= $name ?>:
        <span class="<?= $status === 'OK' ? 'ok' : 'error' ?>">
            <?= $status ?>
        </span>
    </li>
<?php endforeach; ?>
</ul>

<h2>4. Uso de caché</h2>
<p>Cache HIT: <strong><?= $cacheHits ?></strong></p>
<p>Cache MISS: <strong><?= $cacheMiss ?></strong></p>

</body>
</html>
