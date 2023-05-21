<?php

namespace TaxiService;

use Taxi\TaxiContract;

abstract class TaxiService
{
    abstract public function callTaxi (): TaxiContract;

    public function getTaxi(): void
    {
        $taxi = $this->callTaxi();

        echo $taxi->getType() . PHP_EOL;

        echo $taxi->getTax() . PHP_EOL;

        echo PHP_EOL;
    }

}