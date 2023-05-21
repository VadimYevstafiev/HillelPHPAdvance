<?php

namespace TaxiService;

use Taxi\TaxiContract, Taxi\EconomClass;

class EconomTaxiService extends TaxiService
{
    public function callTaxi (): TaxiContract
    {
        return new EconomClass;
    }

}