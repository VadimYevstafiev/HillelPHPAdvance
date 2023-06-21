<?php

use Config\Config;
use Core\View;
use App\Helpers\Session;

function config(string $name): string|null
{
    return Config::get($name);
}

function view(string $view, array $args = [])
{
    View::render($view, $args);
}

function url(string $patch = ''): string
{
    return SITE_URL . '/' . $patch;
}

function urlBack(): string
{
    return $_SERVER['HTTP_REFERER'] ?? url();
}


function currentLink(string $patch): bool
{
    return trim($_SERVER['REQUEST_URI'], '/') === $path;
}

function redirect(string $patch = ''): void
{
    header('Location: ' . url($patch));
    exit;
}

function redirectBack(string $patch = ''): void
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function showInputError(string $key, array $errors = []): string
{
    return !empty($errors[$key])
        ? sprintf('<div class="mb-3 alert alert-danger" role="alert">%s</div>', $errors[$key])
        : '';
}

function notify()
{
    if (!empty($_SESSION['notify'])) {
        $template = '<div class="alert alert-%s" role="alert">%s</div>';
        echo sprintf($template, $_SESSION['notify']['type'], $_SESSION['notify']['message']);
        Session::flashNotify();
    }
}
