<?php

namespace TaxiService;

use Taxi\TaxiContract, Taxi\LuxeClass;

class LuxeTaxiService extends TaxiService
{
    public function callTaxi (): TaxiContract
    {
        return new LuxeClass;
    }

}