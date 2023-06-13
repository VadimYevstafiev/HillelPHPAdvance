<?php
namespace App\Controllers;

use Core\Controller;

class NotesController extends Controller
{

    public function index()
    {

    }

    public function show(int $index)
    {

    }


    public function create()
    {

    }

    public function store()
    {

    }

    public function edit(int $id)
    {
        d(__CLASS__);
        d(__METHOD__);
    }


    public function update(int $index)
    {

    }

    public function destroy(int $index)
    {

    }

    public function before (string $action): bool
    {
        if ($action === 'edit') {

        }
        return true;
    }
}
