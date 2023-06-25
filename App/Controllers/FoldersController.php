<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Folder;
use App\Models\Note;
use App\Helpers\Session;
use App\Validators\FoldersValidator;

class FoldersController extends Controller
{

    public function index()
    {
        $folders = Folder::getUserFoldersWithShared();
        $activeFolder = Folder::GENERAL_FOLDER_ID;
        $notes = Note::byFolder($activeFolder);

        view('pages/dashboard', compact('notes', 'folders', 'activeFolder'));
    }

    public function show(int $id)
    {
        $folders = Folder::getUserFoldersWithShared();
        $activeFolder = $id;

        $notes = $id === Folder::SHARED_FOLDER_ID ? Note::sharedNotes() : Note::byFolder($activeFolder);

        view('pages/dashboard', compact('notes', 'folders', 'activeFolder'));
    }

    public function create()
    {
        view('folders/create');
    }

    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new FoldersValidator();

        if ($validator->validate($fields) && $folderId = Folder::create(array_merge($fields, ['author_id' => Session::id()]))) {
            Session::notify('success', 'Folder was created');
            redirect("folders/{$folderId}");
        }

        Session::notify('danger', 'Oops smth went wrong');
        view('folders/create', $this->getErrors($fields, $validator));
    }

    public function edit(int $id)
    {
        $folder = Folder::find($id);
        view('folders/edit', compact('folder'));
    }

    public function update(int $id)
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new FoldersValidator();

        $fields = array_merge($fields,[
            // 'id' => $id,
            'updated_at' => date('Y-m-d H:i:s')
         ]);
        
        if ($validator->validate($fields) && $folder = Folder::find($id)) {

            if ($folder->update($fields)) {
                redirect("folders/{$id}");
            }
        }

        $fields = array_merge($fields,[
            'id' => $id
         ]);


        view('folders/edit', $this->getErrors($fields, $validator));
    }

    public function destroy(int $id)
    {
        Folder::destroy($id);

        redirect('dashboard');
    }

    public function before(string $action, array $params = []): bool
    {
        if (!Session::check()) {
            redirect('login');
        }

        if (in_array($action, ['update', 'edit', 'destroy']) && !empty($params['id']) && Folder::isGeneral($params['id'])) {
            Session::notify('danger', 'You can not update or remove General folder');
            redirectBack();
        }

        return parent::before($action);
    }
}
