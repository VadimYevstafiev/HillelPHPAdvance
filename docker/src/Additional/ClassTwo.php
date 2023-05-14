<?php

//namespace Src\Additional;

class ClassTwo {

    public function __construct() {

        $tree = new ClassThree();
        $user = new User();

        var_dump(__METHOD__);
    }

}

?>