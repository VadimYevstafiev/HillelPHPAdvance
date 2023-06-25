<?php

namespace App\Models;

use App\Helpers\Session;
use App\Models\SharedNote;
use Core\Model;
use Core\Enums\SqlOrder;

class Folder extends Model
{
    public int $author_id;
    public string $title, $created_at, $updated_at;

    const GENERAL_FOLDER_ID = 1;
    const SHARED_FOLDER_ID = 0;

    static public function isGeneral(int $id): bool
    {
        return $id === static::GENERAL_FOLDER_ID;
    }

    static public function getUserFolders(): array
    {
        return static::select()
            ->where('id', static::GENERAL_FOLDER_ID)
            ->orWhere('author_id', Session::id())
            ->orderBy(['id' => SqlOrder::ASC])
            ->get();
    }

    static public function getUserFoldersWithShared(): array
    {
        $folders = static::getUserFolders();

        if (static::sharedNotesForUser()) {
            array_unshift($folders, static::buildSharedFolder());
        }
        
        return $folders;
    }

    static public function sharedNotesForUser(): bool
    {
        return (bool) SharedNote::select()->where('user_id', Session::id())->get();
    }

    static protected function buildSharedFolder(): static
    {
        $sharedFolder = new static();
        $sharedFolder->id = static::SHARED_FOLDER_ID;
        $sharedFolder->title = 'Shared';
        $sharedFolder->author_id = 0;
        return $sharedFolder;
    }
}
