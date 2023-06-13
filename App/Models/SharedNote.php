<?php

namespace App\Models;

use Core\Model;

class SharedNote extends Model
{
    static protected function getTableName(): string
    {
        return 'shared_notes';
    }
}
