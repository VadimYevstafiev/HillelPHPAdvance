<?php

/**
 * TV will be created by several manufacturers
 * 
 * Productors / Products  |  LCD  |  LED  |
 * -------------------------------------
 *      LG                |   *   |   *   |
 *      Sony              |   *   |   *   |
 * 
 * Product Interfaces: {LCD_TV_Contract, LED_TV_Contract} extends TVproductContract
 * Factory Interface: TVfactoryContract
 */

header('Content-Type: text/plain; charset=UTF-8');

spl_autoload_register(function($className)
{
    $className = str_replace('\\', '/', $className);
    include_once $className . '.php';
});

use Contracts\TVfactoryContract;
use Classes\TVfactory;


function CreateTV (TVfactoryContract $factory)
{
    $functions = array('CreateLCD_TV', 'CreateLED_TV');

    foreach ($functions as $fn)
    {
        $tv = $factory->$fn();
        echo $tv->switchOnTV();
        echo $tv->watchTV();
        echo $tv->switchOffTV();
        echo PHP_EOL;
    }
}

CreateTV (new TVfactory\LG_TVfactory);
CreateTV (new TVfactory\Sony_TVfactory);