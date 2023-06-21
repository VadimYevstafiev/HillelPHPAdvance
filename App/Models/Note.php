<?php

namespace App\Models;

use App\Helpers\Session;
use Core\Model;
use Core\Enums\SqlOrder;

class Note extends Model
{
    public int $author_id, $folder_id;
    public string $content, $created_at, $updated_at, $title;
    public bool $pinned, $completed;

    static public function byFolder(int $folder_id)
    {
        return Note::select()
        ->where('author_id', Session::id())
        ->andWhere('folder_id', $folder_id)
        ->orderBy('id', SqlOrder::DESC)
        ->get();
    }
}
