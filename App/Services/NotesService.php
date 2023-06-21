<?php

namespace App\Services;

use App\Models\Note;
use App\Helpers\Session;
use App\Validators\Base\BaseValidator;

class NotesService
{
    static public function create(BaseValidator $validator, array $fields = []): bool
    {

        if (!$validator->validate($fields)) {
            return false;
        }

        $fields['author_id'] = Session::id();

        return Note::create($fields);
    }

    static public function update(BaseValidator $validator, Note $note, array $fields = []): bool
    {
        //$note = Note::find($id);

        if ($validator->validate($fields)) {
            unset($fields['folder_id']);
            return $note->update($fields);
        }

        return false;
    }

    static public function destroy(int $id): bool
    {
        return Note::destroy($id);
    }
}
