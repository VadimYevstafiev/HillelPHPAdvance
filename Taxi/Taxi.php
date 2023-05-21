<?php

namespace Taxi;

abstract class Taxi implements TaxiContract
{
    public function getType (): string
    {
        return 'It`s a ' . get_class($this);
    }

    public function getTax (): string
    {
        return 'It cost as ' . get_class($this);
    }
}