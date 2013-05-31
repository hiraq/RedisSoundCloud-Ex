<?php

$redis = new \Redis\Data();       
$redis->getRedis()->hSet('query','test1','testing1');
$redis->getRedis()->set('test_string','string');

$data = $redis->getRedis()->hGet('query','test1');
$string = $redis->getRedis()->get('test_string');

\Core\Debug::vars($data);
\Core\Debug::vars($string);