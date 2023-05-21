<?php

namespace TaxiService;

use Taxi\TaxiContract, Taxi\StandartClass;

class StandartTaxiService extends TaxiService
{
    public function callTaxi (): TaxiContract
    {
        return new StandartClass;
    }

}