<?php

namespace App\Models;

use App\Helpers\Session;
use Core\Model;

class Folder extends Model
{
    public int $author_id;
    public string $title, $created_at, $updated_at;

    const GENERAL_FOLDER_ID = 1;

    static public function isGeneral(int $id): bool
    {
        return $id === static::GENERAL_FOLDER_ID;
    }

    static public function getUserFolders(): array
    {
        return static::select()
            ->where('id', static::GENERAL_FOLDER_ID)
            ->orWhere('author_id', Session::id())
            ->orderBy('id')
            ->get();
    }
}
