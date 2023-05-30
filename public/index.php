<?php

use Core\DB;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

try {

    if (!session_id()) {
        session_start();
    }

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    DB::connect();
} catch (PDOException $e) {
    dd('PDOException', $e->getMessage());
} catch (Exception $e) {
    dd('Exception', $e->getMessage());
}



//dd(Config::get('db.user'));