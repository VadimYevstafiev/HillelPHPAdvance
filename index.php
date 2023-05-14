<?php

header('Content-Type: text/plain; charset=UTF-8');

//require_once __DIR__ . '/src/Models/User.php';
//require_once __DIR__ . '/src/Additional/ClassThree.php';
//require_once __DIR__ . '/src/Additional/ClassTwo.php';
//require_once __DIR__ . '/src/ClassOne.php';

spl_autoload_register(function($className)
{
    $className = lcfirst(str_replace('\\', '/', $className));
    var_dump($className);
    include_once $className . '.php';
});

use Src\ClassOne;

$one = new ClassOne();