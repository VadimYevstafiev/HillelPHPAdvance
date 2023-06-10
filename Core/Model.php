<?php

namespace Core;

use Core\Traits\Queryable;

abstract class Model
{
    use Queryable;

    public int $id;

    static protected function getTableName(): string
    {
       $nameArray = explode('\\', static::class);
       return (lcfirst(array_pop($nameArray)) . 's');
    }
}