<?php

namespace App\Controllers;

use Core\Controller;
use App\Validators\Auth\SignUpValidator;

class AuthController extends Controller
{
    public function login()
    {
        view('auth/login');
    }

    public function logout()
    {
    //    view('auth/logout');
    }

    public function register()
    {
        view('auth/register');
    }

    public function signup()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new SignUpValidator();

        if ($validator->validate($fields)) {
            d('work');
        }
        dd($validator->getErrors());
    }

    public function verify() {}
}
