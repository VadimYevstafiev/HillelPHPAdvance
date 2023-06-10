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


    $user = User::find(2);

    $user->destroy();


  //  d($query->getSqlQuery());
  //  dd($query->get());
} catch (PDOException $e) {
    dd('PDOException', $e->getMessage());
} catch (Exception $e) {
    dd('Exception', $e->getMessage());
}