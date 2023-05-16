<?php

namespace Src\Deliveries;

class EmailDelivery extends Delivery

{
    public function deliver(string $format)

    {
        return parent::deliver($format) . " по имейл";
    }
}