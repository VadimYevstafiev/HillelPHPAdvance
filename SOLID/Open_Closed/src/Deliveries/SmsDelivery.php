<?php

namespace Src\Deliveries;

class SmsDelivery extends Delivery

{
    public function deliver(string $format)

    {
        return parent::deliver($format) . " в смс";
    }
}