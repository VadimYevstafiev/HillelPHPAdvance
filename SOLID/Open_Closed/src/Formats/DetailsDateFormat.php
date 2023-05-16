<?php

namespace Src\Formats;

class DetailsDateFormat extends DateFormat

{
    public function format(string $string)

    {
        return parent::format($string) . ' - With some details';
    }
}