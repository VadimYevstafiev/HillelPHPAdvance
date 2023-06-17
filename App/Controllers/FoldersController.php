<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Folder;
use App\Models\Note;
use App\Helpers\Session;
use App\Validators\FoldersValidator;

class FoldersController extends Controller
{

    // 8 1 Note from General folder for user test@test.com
    // 8 2 Note from User 8 folder
    public function index()
    {
        $this::show(1);
    }

    public function show(int $id)
    {
        $folders = Folder::all();
        $activeFolder = $id;

        $notes = Note::select()
        ->where('author_id', Session::id())
        ->andWhere('folder_id', $activeFolder)
        ->get();

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
            redirect("folders/{$folderId}");
        }

        view('auth/login', $this->getErrors($fields, $validator));
    }

    public function before(string $action): bool
    {
        if (!Session::check()) {
            redirect('login');
        }
        return parent::before($action);
    }
}
