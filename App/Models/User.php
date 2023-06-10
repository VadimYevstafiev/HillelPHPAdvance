<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public int $id;
    public string $email, $password, $created_at;
}