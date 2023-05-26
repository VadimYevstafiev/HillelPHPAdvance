<?php

namespace TVproduct;

abstract class TVproduct implements TVproductCotract
{
    protected string $fabricator;

    protected string $type;

    public function switchOnTV(): string
    {
        return $this->fabricator . ' ' . $this->type . ' TV switched on' . PHP_EOL;
    }

    public function switchOffTV(): string
    {
        return $this->fabricator . ' ' . $this->type . ' TV switched off' . PHP_EOL;
    }

    public function watchTV(): string
    {
        return $this->fabricator . ' ' . $this->type . ' TV watched' . PHP_EOL;
    }
}