<?php

namespace Classes\TVproduct;

use Contracts;

abstract class TVproduct implements Contracts\TVproductContract
{
    protected string $fabricator;

    protected string $type;

    public function switchOnTV(): string
    {
        return $this->fabricator . ' ' . $this->type . ' TV is switched on' . PHP_EOL;
    }

    public function switchOffTV(): string
    {
        return $this->fabricator . ' ' . $this->type . ' TV is switched off' . PHP_EOL;
    }

    public function watchTV(): string
    {
        return $this->fabricator . ' ' . $this->type . ' TV is watched' . PHP_EOL;
    }
}