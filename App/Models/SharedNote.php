<?php

namespace App\Models;

use Core\Model;
use Core\DB;

class SharedNote extends Model
{
    public int $note_id, $user_id;

    static protected function getTableName(): string
    {
        return 'shared_notes';
    }

    static public function create(array $fields): false|int
    {

        $params = static::prepareQueryParams($fields);

        $query = "INSERT INTO " . static::getTableName() . " ({$params['keys']}) VALUES ({$params['placeholders']})";
        $query = DB::connect()->prepare($query);

        if (!$query->execute($fields)) {
            return false;
        }

        return 1;
    }

    public function remove(): bool
    {
        $query = "DELETE FROM " . static::getTableName() . " WHERE note_id = :note_id AND user_id = :user_id";
        $query = DB::connect()->prepare($query);
        $query->bindParam('note_id', $this->note_id);
        $query->bindParam('user_id', $this->user_id);

        return $query->execute();
    }
}
