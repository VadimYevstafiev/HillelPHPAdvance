<?php

namespace Src\Formats;

abstract class Format implements Formats

{
    public function format(string $string)

    {
        return $string;
    }
}