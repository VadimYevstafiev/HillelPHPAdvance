<?php

namespace TVproduct;

interface TVproductCotract
{
    public function switchOnTV(): string;

    public function switchOffTV(): string;

    public function watchTV(): string;
}