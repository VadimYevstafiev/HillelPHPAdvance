<?php

namespace App\Helpers;

class Logout
{
    static protected bool $logout = false;

    static public function setLogout(): void
    {
        static::$logout = true;
    }

    static public function checkLogout(): bool
    {
        if (static::$logout) {
            static::$logout = false; 
            return true;
        } else {
            return static::$logout;
        }  
    }
}
