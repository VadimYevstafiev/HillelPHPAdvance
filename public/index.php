<?php

if (!session_id()) {
    session_start();
}


use Core\Router;
//use App\Models\User;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

try {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])) {
        Router::dispatch($_SERVER['REQUEST_URI']);
    }
} catch (PDOException $e) {
    dd('PDOException', $e->getMessage());
} catch (Exception $e) {
    dd('Exception', $e->getMessage());
}
