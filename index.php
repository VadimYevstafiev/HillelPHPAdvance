<?php

header('Content-Type: text/plain; charset=UTF-8');

spl_autoload_register(function($className)
{
    $className = str_replace('\\', '/', $className);
    include_once $className . '.php';
});

use TVfactory\{TVfactoryContract, LG_TVfactory, Sony_TVfactory};

function CreateTV (TVfactoryContract $factory)
{
    $tvs[0] = $factory->CreateLCD_TV();
    $tvs[1] = $factory->CreateLED_TV();

    foreach ($tvs as $tv)
    {
        echo $tv->switchOnTV();
        echo $tv->watchTV();
        echo $tv->switchOffTV();
        echo PHP_EOL;
    }
}

CreateTV (new LG_TVfactory);
CreateTV (new Sony_TVfactory);