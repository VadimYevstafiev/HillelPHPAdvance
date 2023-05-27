<?php

header('Content-Type: text/plain; charset=UTF-8');

spl_autoload_register(function($className)
{
    $className = str_replace('\\', '/', $className);
    include_once $className . '.php';
});

use Classes\Contact;

$contact = new Contact();
$newContact = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    ->build();

var_dump($newContact);
var_dump($contact);