<?php

header('Content-Type: text/plain; charset=UTF-8');

spl_autoload_register(function($className)
{
    $className = str_replace('\\', '/', $className);
    include_once $className . '.php';
});

use TaxiService\{EconomTaxiService, StandartTaxiService, LuxeTaxiService};

var_dump((new EconomTaxiService())->callTaxi());
(new EconomTaxiService())->getTaxi();

var_dump((new StandartTaxiService())->callTaxi());
(new StandartTaxiService())->getTaxi();

var_dump((new LuxeTaxiService())->callTaxi());
(new LuxeTaxiService())->getTaxi();
?>