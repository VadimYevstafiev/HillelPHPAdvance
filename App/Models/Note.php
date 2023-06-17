<?php

namespace App\Models;

use Core\Model;

class Note extends Model
{
    public int $author_id, $folder_id;
    public string $content, $created_at, $updated_at, $title;
    public bool $pinned, $completed;
    
}
