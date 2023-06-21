<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\{Note, Folder};
use App\Helpers\Session;
use App\Services\NotesService;
use App\Validators\NotersValidator;

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
        view('notes/create', [
            'folders' => Folder::getUserFolders()
        ]);
    }

    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);

        $validator = new NotersValidator();

        if (NotesService::create($validator, $fields)) {
            Session::notify('success', 'Note was created!');
            redirect("folders/{$fields['folder_id']}");
        }

        
        view('notes/create', $this->getErrors($fields, $validator));
    }

    public function edit(int $id)
    {
        view("notes/edit", ['note' => Note::find($id)]);
    }


    public function update(int $id)
    {

        $fields = filter_input_array(INPUT_POST, $_POST);
        $note = Note::find($id);
        $fields['folder_id'] = $note->folder_id;

        $validator = new NotersValidator();

        if (NotesService::update($validator, $id, $fields)) {
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
