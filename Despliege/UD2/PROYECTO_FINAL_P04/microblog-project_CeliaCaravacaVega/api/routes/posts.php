<?php

// ===============================
// GET /api/posts  (listar posts)
// ===============================
if ($_SERVER["REQUEST_METHOD"] === "GET" && !isset($uri[2])) {
    $stmt = $pdo->query("SELECT id, title, created_at FROM posts");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}


// =====================================
// GET /api/posts/:id  (obtener un post)
// =====================================
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($uri[2])) {
    $id = intval($uri[2]);

    $cacheKey = "api_post:$id";
    $cached = $redis->get($cacheKey);

    if ($cached) {
        $redis->incr("cache:hits");
        echo $cached;
        exit;
    }

    $redis->incr("cache:miss");

    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        echo json_encode(["error" => "Post no encontrado"]);
        exit;
    }

    $redis->set($cacheKey, json_encode($post));

    echo json_encode($post);
    exit;
}


// ===============================
// POST /api/posts  (crear post)
// ===============================
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([
        $data["title"],
        $data["content"]
    ]);

    echo json_encode(["status" => "Post creado"]);
    exit;
}
