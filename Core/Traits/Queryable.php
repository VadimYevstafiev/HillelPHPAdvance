<?php

namespace Core\Traits;

use Core\DB;
use PDO;

trait Queryable
{
    static protected string $query = '';
    protected array $commands = [];

    abstract static protected function getTableName(): string;

    static public function select(array $columns =['*']): static
    {
        static::resetQuery();
        static::$query = 'SELECT ' . implode(', ', $columns) . ' FROM ' . static::getTableName();

        $obj = new static;
        $obj->commands[] ='select';

        return $obj;
    }

    static public function findBY(string $column, mixed $value): static|false
    {
        $query = DB::connect()->prepare("SELECT * FROM "  . static::getTableName() . " WHERE {$column} = :{$column}");
        $query->bindParam($column, $value);
        $query->execute();

        return $query->fetchObject(static::class);
    }

    static public function find(int $id): static|false
    {
        return static::findBY('id', $id);
    }
  
    static protected function resetQuery()
    {
        static::$query = '';
    }

    public function where(string $column, string $operator, $value): static
    {
        static::$query .= " WHERE {$column} {$operator} {$value}";
        $this->comands[] = 'where';

        return $this;
    }

    public function get()
    {
        return DB::connect()->query(static::$query)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public function getSqlQuery(): string
    {
        return static::$query;
    }
}