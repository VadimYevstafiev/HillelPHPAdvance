<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\{Note, Folder, User, SharedNote};
use App\Helpers\Session;
use App\Services\NotesService;
use App\Validators\NotesValidator;

class NotesController extends Controller
{
    public function show(int $id)
    {

        view('notes/show', [
            'note' => Note::find($id)
        ]);
    }

    public function create()
    {   
        $users = User::select()->where('id', Session::id(), '!=')->get();

        view('notes/create', [
            'folders' => Folder::getUserFolders(),
            'users' => $users
        ]);
    }

    public function store()
    {
        $fields = filter_input_array(INPUT_POST, NotesValidator::REQUEST_RULES, false);

        $validator = new NotesValidator();

        if (NotesService::create($validator, $fields)) {
            Session::notify('success', 'Note was created!');
            redirect("folders/{$fields['folder_id']}");
        }

        
        view('notes/create', $this->getErrors($fields, $validator));
    }

    public function edit(int $id)
    {
        $folders = Folder::getUserFolders();
        $users = User::select()->where('id', Session::id(), '!=')->get();
        $sharedUsers = SharedNote::select(['user_id'])->where('note_id', $id)->pluck('user_id');
        $note = Note::find($id);

        view("notes/edit", compact('folders', 'users', 'note', 'sharedUsers'));
    }


    public function update(int $id)
    {

        $fields = filter_input_array(INPUT_POST, NotesValidator::REQUEST_RULES, false);
        $note = Note::find($id);
        $fields['folder_id'] = $note->folder_id;

        $validator = new NotesValidator();

        if (NotesService::update($validator, $note, $fields)) {
            Session::notify('success', 'Note was updated!');
            redirect("folders/{$fields['folder_id']}");
        }

        view("notes/{$id}/update", $this->getErrors($fields, $validator));
    }

    public function destroy(int $id)
    {

       // $fields = filter_input_array(INPUT_POST, $_POST);
        $folder_id = Note::find($id)->folder_id;
 
        NotesService::destroy($id);
        Session::notify('success', 'Note was destroy!');

        redirect("folders/{$folder_id}");
    }

    public function before (string $action, array $params = []): bool
    {
        if ($action === 'edit') {

        }
        return true;
    }
}
