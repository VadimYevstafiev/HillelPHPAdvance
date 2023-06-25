<?php

namespace App\Services;

use App\Models\{Note, SharedNote};
use App\Helpers\Session;
use App\Validators\Base\BaseValidator;

class NotesService
{
    static public function create(BaseValidator $validator, array $fields = []): bool
    {

        if (!$validator->validate($fields)) {
            return false;
        }

        $sharedUsers = $fields['users'] ?? [];
        unset($fields['users']);

        $fields = static::prepareFields($fields);
        $noteId = Note::create($fields);

        if (!empty($sharedUsers)) {
            foreach ($sharedUsers as $userID) {
                SharedNote::create(['note_id' => $noteId, 'user_id' => $userID]);
            }
        }

        return $noteId;
    }

    static public function update(BaseValidator $validator, Note $note, array $fields = []): bool
    {
        if (!$validator->validate($fields)) {
            return false;
        }

        $sharedUsers = $fields['users'] ?? [];
        unset($fields['users']);

        $fields = static::prepareFields($fields);

        if ($note->update($fields)) {
            if (!empty($sharedUsers)) {

                $sharedNotesToRemove = SharedNote::select()
                    ->where('note_id', $note->id)
                    ->whereNotIn('user_id', $sharedUsers)
                    ->get();

                if (!empty($sharedNotesToRemove)) {
                    foreach ($sharedNotesToRemove as $sharedNote) {
                        $sharedNote->remove();
                    }
                }

                $existsUsers = SharedNote::select(['user_id'])
                    ->where('note_id', $note->id)
                    ->pluck('user_id');

                
                $usersToAdd = !in_array(0, $sharedUsers) ? array_diff($sharedUsers, $existsUsers) : [];

                if (!empty($usersToAdd)) {
                    foreach ($usersToAdd as $userID) {
                        SharedNote::create(['note_id' => $note->id, 'user_id' => $userID]);
                    }
                }
            }
        }
        return true;
    }

    static public function destroy(int $id): bool
    {
        return Note::destroy($id);
    }

    static public function prepareFields(array $fields): array
    {
        $fields['author_id'] = Session::id();
        $fields['pinned'] = $fields['pinned'] ?? 0;
        $fields['completed'] = $fields['completed'] ?? 0;

        return $fields;
    }
}
