<?php
session_start();

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/redis.php';

// 1. Obtener ID del post desde la URL
if (!isset($_GET['id'])) {
    die("ID de post no especificado.");
}

$postId = intval($_GET['id']);
$cacheKey = "post:$postId";

// 2. Intentar obtener el post desde Redis
$cachedPost = $redis->get($cacheKey);

if ($cachedPost) {
    $redis->incr("cache:hits");
    $post = json_decode($cachedPost, true);
    $fromCache = true;
} else {
    $redis->incr("cache:miss");
    // 3. Obtener el post desde la base de datos
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$postId]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        die("Post no encontrado.");
    }

    // Guardar en Redis
    $redis->set($cacheKey, json_encode($post));
    $fromCache = false;
}

// 4. Incrementar contador de vistas (solo si viene de BD)
if (!$fromCache) {
    $pdo->prepare("UPDATE posts SET views = views + 1 WHERE id = ?")
        ->execute([$postId]);

    // Actualizar el valor en caché
    $post['views']++;
    $redis->set($cacheKey, json_encode($post));
}

// 5. Obtener comentarios del post
$stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
$stmt->execute([$postId]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1><?= htmlspecialchars($post['title']) ?></h1>
<p><strong>Autor:</strong> <?= htmlspecialchars($post['author']) ?></p>
<p><strong>Fecha:</strong> <?= htmlspecialchars($post['created_at']) ?></p>
<p><strong>Vistas:</strong> <?= $post['views'] ?></p>
<p><strong>Fuente:</strong> <?= $fromCache ? "Redis (caché)" : "Base de datos" ?></p>

<hr>

<p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

<hr>

<h2>Comentarios</h2>

<?php if (count($comments) === 0): ?>
    <p>No hay comentarios aún.</p>
<?php else: ?>
    <?php foreach ($comments as $c): ?>
        <div style="margin-bottom: 15px;">
            <strong><?= htmlspecialchars($c['author']) ?></strong> (<?= $c['created_at'] ?>)
            <p><?= htmlspecialchars($c['content']) ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
