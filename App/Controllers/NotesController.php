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
        view('notes/show', ['note' => Note::find($id)]);
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
        d(__CLASS__);
        d(__METHOD__);
    }


    public function update(int $id)
    {

    }

    public function destroy(int $id)
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        NotesService::destroy($id);

        d($fields);
        dd($id);

        redirect("folders/{$fields['folder_id']}");
    }

    public function before (string $action, array $params = []): bool
    {
        if ($action === 'edit') {

        }
        return true;
    }
}
