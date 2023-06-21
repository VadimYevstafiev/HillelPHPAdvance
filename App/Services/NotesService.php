<?php

namespace App\Services;

use App\Models\Note;
use App\Helpers\Session;
use App\Validators\Base\BaseValidator;

class NotesService
{
    static public function create(BaseValidator $validator, array $fields = []): bool
    {
        if ($validator->validate($fields)) {
            return false;
        }

        $fields['author_id'] = Session::id();

        return Note::create($fields);
    }

    static public function update()
    {
        
    }

    static public function destroy(int $id): bool
    {
        return Note::destroy($id);
    }
}
