<?php

namespace App\Models;

use App\Helpers\Session;
use Core\Model;
use Core\Enums\SqlOrder;

class Note extends Model
{
    public int $author_id, $folder_id;
    public string $content, $created_at, $updated_at, $title, $author = '';
    public bool $pinned, $completed, $shared = false;

    static public function sharedNotes()
    {
        return Note::select(['notes.*', 'us.email as author'])
        ->join('shared_notes sn', 'sn.note_id', 'notes.id')
        ->join('users us', 'notes.author_id', 'us.id')
        ->where('sn.user_id', Session::id())
        ->orderBy(['notes.id' => SqlOrder::DESC])
        ->get();
    }

    static public function byFolder(int $folder_id)
    {

        return static::selectWithSharedField()
        ->join('shared_notes sn', 'notes.id', 'sn.note_id')
        ->where('author_id', Session::id())
        ->andWhere('folder_id', $folder_id)
        ->groupBy(['notes.id', 'sn.note_id'])
        ->orderBy([
            'notes.pinned' => SqlOrder::DESC,
            'notes.completed' => SqlOrder::ASC,
            'notes.id' => SqlOrder::DESC
        ])
        ->get();
    }

    static protected function selectWithSharedField(): Model
    {
        return Note::select([
            'notes.*',
            'CASE WHEN sn.note_id IS NULL THEN false ELSE true END as shared'
           // '(SELECT (COUNT(note_id) > 0) as count FROM shared_notes WHERE note_id = notes.id) as shared'
         ]);
    }
}
