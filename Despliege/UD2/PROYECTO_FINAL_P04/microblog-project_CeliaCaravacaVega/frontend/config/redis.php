<?php
function getRedisConnection() {
    $host = getenv('REDIS_HOST') ?: 'redis';
    $port = getenv('REDIS_PORT') ?: 6379;
    
    try {
        $redis = new Redis();
        $redis->connect($host, $port);
        return $redis;
    } catch (Exception $e) {
        // Si Redis no está disponible, devolver objeto mock
        return new class {
            public function get($key) { return false; }
            public function setex($key, $ttl, $value) { return false; }
            public function exists($key) { return false; }
            public function ping() { return false; }
        };
    }
}