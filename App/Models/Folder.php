<?php

namespace App\Models;

use Core\Model;

class Folder extends Model
{
    public int $author_id;
    public string $title, $created_at, $updated_at;
}
