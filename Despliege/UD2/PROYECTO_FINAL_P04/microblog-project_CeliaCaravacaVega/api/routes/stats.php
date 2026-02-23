<?php

$stats = [
    "posts" => $pdo->query("SELECT COUNT(*) FROM posts")->fetchColumn(),
    "comments" => $pdo->query("SELECT COUNT(*) FROM comments")->fetchColumn(),
    "users" => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
    "redis_connected" => $redis->ping() === "+PONG"
];

echo json_encode($stats);
