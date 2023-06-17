<?php

namespace App\Validators\Auth;

class SignOutValidator extends Base
{
    public function validate(array $fields = []): bool
    {
        return array_key_exists('yes', $fields);

    }
}
