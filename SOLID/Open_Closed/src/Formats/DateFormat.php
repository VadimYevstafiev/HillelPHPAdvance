<?php

namespace Src\Formats;

class DateFormat extends Format

{
    public function format(string $string)

    {
        return date('Y-m-d H:i:s') . parent::format($string);
    }
}