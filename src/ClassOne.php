<?php

namespace Src;

use Src\Additional\ClassTwo;

class ClassOne
{

    public function __construct()
    {

        $two = new ClassTwo();

        var_dump(__METHOD__);
    }
}