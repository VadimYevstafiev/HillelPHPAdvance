<?php

namespace Src\Additional;

use Src\Models\User;

class ClassThree
{

    public function __construct()
    {

        $user = new User();

        var_dump(__METHOD__);

    }

}