<?php

namespace App\Controllers;

use Core\Controller;
use App\Validators\Auth\{SignUpValidator, LoginValidator, SignOutValidator};
use App\Services\AuthService;
use App\Services\Users\CreateService;
use App\Helpers\Session;
use App\Helpers\Logout;

class AuthController extends Controller
{
    public function login()
    {
        view('auth/login');
    }

    public function logout()
    {
        Logout::setLogout();
        view('auth/logout');
    }

    public function register()
    {
        view('auth/register');
    }

    public function signup()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new SignUpValidator();

        if ($validator->validate($fields) && CreateService::call($fields)) {
            redirect('login');
        }

        view('auth/register', $this->getErrors($fields, $validator));
    }

    public function signout()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new SignOutValidator();
        if (AuthService::destroy($fields, $validator)) {
            redirect('login');
        } else {
            redirect('dashboard');
        }
    }

    public function verify() 
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new LoginValidator();
        if (AuthService::call($fields, $validator)) {
            redirect('dashboard');
        }

        view('auth/login', $this->getErrors($fields, $validator));
    }

    public function before (string $action, array $params = []): bool
    {
        if (in_array($action, ['login', 'register']) && Session::check()) {
            if (!empty($_SERVER['HTTP_REFERER'])) {
                redirectBack();
            } else {
                redirect();
            }
        }

        return parent::before($action);
    }
}
