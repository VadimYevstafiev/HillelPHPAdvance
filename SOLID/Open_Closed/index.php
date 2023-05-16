<?php

header('Content-Type: text/plain; charset=UTF-8');

spl_autoload_register(function($className)
{
    $className = lcfirst(str_replace('\\', '/', $className));
    include_once $className . '.php';
});

use Src\Loggers\Logger;

$logger = new Logger(new Src\Formats\RawFormat(), new Src\Deliveries\SmsDelivery());
$logger->log('Emergency error! Please fix me!');