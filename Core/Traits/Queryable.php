<?php

namespace Core\Traits;

use Core\DB;
use Core\Enums\SqlOrder;
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

    static public function all(): array
    {
        return static::select()->get();
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

    static public function create(array $fields): false|int
    {
        $params = static::prepareQueryParams($fields);

        $query = "INSERT INTO " . static::getTableName() . " ({$params['keys']}) VALUES ({$params['placeholders']})";
        $query = DB::connect()->prepare($query);

        if (!$query->execute($fields)) {
            return false;
        }

        return (int) DB::connect()->lastInsertId();
    }

    static protected function prepareQueryParams(array $fields): array
    {
        $keys = array_keys($fields);
        $placeholders = preg_filter('/^/', ':', $keys);

        return [
            'keys' => implode(', ', $keys),
            'placeholders' => implode(', ', $placeholders)
        ];
    }
  
    static protected function resetQuery()
    {
        static::$query = '';
    }

    public function update(array $fields): bool
    {
        $query = "UPDATE " . static::getTableName() . " SET" . $this->updatePlaceholders(array_keys($fields)) . " WHERE id = :id";
        
        $query = DB::connect()->prepare($query);
        $fields['id'] = $this->id;

        return $query->execute($fields);
    }

    static public function destroy(int $id): bool
    {
        $query = "DELETE FROM " . static::getTableName() . " WHERE id = :id";
        $query = DB::connect()->prepare($query);
        $query->bindParam('id', $id);

        return $query->execute();
    }

    public function where(string $column, $value, string $operator = '='): static
    {

        if ($this->prevent(['group', 'limit', 'order', 'having'])) {
            throw new \Exception("[Queryble]: WHERE can not be after ['group', 'limit', 'order', 'having']");
        }

        $obj = in_array('select', $this->commands) ? $this : static::select();

        if (!is_bool($value) && $operator !== 'IN') {
            $value = "'{$value}'";
        }

        if (!in_array('where', $this->commands)) {
            static::$query .= " WHERE";           
        }

        static::$query .= " {$column} {$operator} {$value}";
        $obj->commands[] = 'where';

        return $obj;
    }

    public function andWhere(string $column, $value, string $operator = '='): static
    {
        static::$query .= " AND";

        return $this->where($column, $value, $operator);
    }

    public function whereIn(string $column, array $value, $type = 'AND'): static
    {
        if (in_array('where', $this->commands)) {
            static::$query .= " {$type}";
        }

        $value = "(" . implode(',', $value) . ") ";
        return $this->where($column, $value, 'IN');
    }

    public function orWhere(string $column, $value, string $operator = '='): static
    {
        static::$query .= " OR";

        return $this->where($column, $value, $operator);
    }

    public function orderBy (string $column, SqlOrder $sqlOrder = SqlOrder::ASC): static
    {

        if (!$this->prevent(['select'])) {
            throw new \Exception("[Queryble]: ORDER BY can not be before ['group', 'limit', 'order', 'having']");
        }

        $this->commands[] = 'order';

        static::$query .= " ORDER BY {$column} " . $sqlOrder->value;

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

    protected function prevent(array $allowedMethods): bool
    {
        foreach($allowedMethods as $method) {
           if (in_array($method, $this->commands)) {
                return true;
           }
        }

        return false;
    }

    protected function updatePlaceholders(array $keys): string
    {
        $string = '';
        $last_key = array_key_last($keys);

        foreach ($keys as $index => $key) {
            $string .= " {$key}=:{$key}" . ($last_key === $index ? '' : ',');
        }

        return $string;
    }
}
