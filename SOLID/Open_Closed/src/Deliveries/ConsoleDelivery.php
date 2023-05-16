<?php

namespace Src\Deliveries;

class ConsoleDelivery extends Delivery

{
    public function deliver(string $format)

    {
        return parent::deliver($format) . " в консоль";
    }
}