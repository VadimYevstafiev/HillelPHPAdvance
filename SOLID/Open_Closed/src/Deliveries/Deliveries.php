<?php

namespace Src\Deliveries;

interface Deliveries

{
    public function deliver(string $format);
}