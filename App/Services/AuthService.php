<?php

namespace App\Services;

use App\Validators\Auth\{LoginValidator, SignOutValidator};
use App\Models\User;
use App\Helpers\Session;

class AuthService
{
    static public function call(array $fields, LoginValidator $validator): bool
    {
        if ($validator->validate($fields)) {
            $user = User::findBy('email', $fields['email']);
            if ($validator->verifyPassword($fields['password'], $user->password)) {
                Session::setUserdata($user->id, ['email' => $user->email]);
                return true;
            }
        }

        return false;
    }

    static public function destroy(array $fields, SignOutValidator $validator): bool
    {
        if ($validator->validate($fields)) {
            Session::destroy();
            return true;
        }

        return false;
    }
}
