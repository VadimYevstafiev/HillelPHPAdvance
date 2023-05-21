<?php

namespace Taxi;

interface TaxiContract
{
    public function getType(): string;

    public function getTax(): string;
}