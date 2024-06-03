<?php

// Create Router instance
$router = new \Bramus\Router\Router();

require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/client.php';

// Run it!
$router->run();