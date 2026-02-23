<?php
$redis = new Redis();
$redis->connect(getenv("REDIS_HOST"), getenv("REDIS_PORT"));
