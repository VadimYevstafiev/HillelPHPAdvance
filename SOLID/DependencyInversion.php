<?php

interface Database
{
    public function getData();
}

class Mysql implements Database
{
    public function getData()
    {
        return 'some data from database';
    }
}

class Controller
{

    public function __construct(private Database $adapter) {}

    function getData()
    {
        return $this->adapter->getData();
    }
}

$item = new Controller(new Mysql());
echo $item->getData();