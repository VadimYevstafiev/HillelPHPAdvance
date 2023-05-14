<?php

//namespace Src;

class ClassOne {

    public function __construct() {

        $tree = new ClassThwo();

        var_dump(__METHOD__);
    }
}
?>