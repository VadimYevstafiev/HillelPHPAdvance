<?php

namespace Contracts;

interface TVproductContract
{
    public function switchOnTV(): string;

    public function switchOffTV(): string;

    public function watchTV(): string;
}