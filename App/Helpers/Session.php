<?php

namespace App\Helpers;

class Session
{
    static public function check(): bool
    {
        return !empty($_SESSION['user_data']);
    }

    static public function id(): int|null
    {
        return $_SESSION['user_data']['id'] ?? null;
    }

    static public function setUserdata(int $id, $options = []): void
    {
        $options = array_merge(
            compact('id'),
            $options
        );

        $_SESSION['user_data'] = array_merge(
            $_SESSION['user_data'] ?? [],
            $options
        );
    }

    static public function destroy(): void
    {
        if (session_id()) {
            session_destroy();
        }
    }
}
