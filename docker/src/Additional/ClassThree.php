<?php

//namespace Src\Additional;

class ClassThree {

    public function __construct() {

        $user = new User();

        var_dump(__METHOD__);

    }

}
?>