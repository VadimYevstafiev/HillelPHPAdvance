<?php

namespace Src\Loggers;

use Src\Formats\Formats, Src\Deliveries\Deliveries;

class Logger

{

    public function __construct(private Formats $format, private Deliveries $delivery)

    {
        $this->format   = $format;
        $this->delivery = $delivery;
    }

    public function log($string)

    {
        echo $this->delivery->deliver($this->format->format($string));
    }
}