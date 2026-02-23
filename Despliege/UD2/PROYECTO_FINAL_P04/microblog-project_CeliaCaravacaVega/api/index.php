<?php
require_once "database.php";
require_once "redis.php";

$uri = explode("/", trim($_SERVER["REQUEST_URI"], "/"));

header("Content-Type: application/json");

if ($uri[0] === "api") {
    switch ($uri[1]) {

        case "posts":
            require "routes/posts.php";
            break;

        case "stats":
            require "routes/stats.php";
            break;

        default:
            echo json_encode(["error" => "Endpoint no encontrado"]);
    }
}
