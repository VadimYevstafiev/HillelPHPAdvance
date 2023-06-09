<?php

use Core\DB;
use App\Models\User;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

try {

    if (!session_id()) {
        session_start();
    }

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    d(User::findBy('password', 1234));
    dd(User::select()->where('email', '=', '1234@email.com')->getSqlQuery());
} catch (PDOException $e) {
    dd('PDOException', $e->getMessage());
} catch (Exception $e) {
    dd('Exception', $e->getMessage());
}