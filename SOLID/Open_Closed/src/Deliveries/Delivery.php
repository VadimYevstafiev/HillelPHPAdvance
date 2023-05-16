<?php

namespace Src\Deliveries;

abstract class Delivery implements Deliveries

{
    public function deliver(string $format)

    {
        return "Вывод формата ({$format})";
    }
}