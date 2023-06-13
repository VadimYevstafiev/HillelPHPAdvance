<?php

use Config\Config;
use Core\View;

function config(string $name): string|null
{
    return Config::get($name);
}

function view(string $view, array $args = [])
{
    View::render($view, $args);
}

function url(string $patch): string
{
    return SITE_URL . '/' . $patch;
}
