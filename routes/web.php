<?php

use Core\Router;
use App\Controllers;

//notes/4/edit
//Router::add(
//    'notes/{id:\d+}/edit',
//    [
//        'controller' => \App\Controllers\NotesController::class,
//        'action' => 'edit',
//        'method' => 'GET'
//    ]
//);
Router::add(
    'login',
    [
        'controller' => Controllers\AuthController::class,
        'action' => 'login',
        'method' => 'GET'    
    ]
);
Router::add(
    'logout',
    [
        'controller' => Controllers\AuthController::class,
        'action' => 'logout',
        //'method' => 'POST'
        'method' => 'GET'
    ]
);
Router::add(
    'register',
    [
        'controller' => Controllers\AuthController::class,
        'action' => 'register',
        'method' => 'GET'    
    ]
);
Router::add(
    'auth/signup',
    [
        'controller' => Controllers\AuthController::class,
        'action' => 'signup',
        'method' => 'POST'    
    ]
);
Router::add(
    'auth/signout',
    [
        'controller' => Controllers\AuthController::class,
        'action' => 'signout',
        'method' => 'POST'    
    ]
);
Router::add(
    'auth/verify',
    [
        'controller' => Controllers\AuthController::class,
        'action' => 'verify',
        'method' => 'POST'    
    ]
);
Router::add(
    'dashboard',
    [
        'controller' => Controllers\FoldersController::class,
        'action' => 'index',
        'method' => 'GET'    
    ]
);
Router::add(
    'folders/{id:\d+}',
    [
        'controller' => Controllers\FoldersController::class,
        'action' => 'show',
        'method' => 'GET'    
    ]
);
Router::add(
    'folders/create',
    [
        'controller' => Controllers\FoldersController::class,
        'action' => 'create',
        'method' => 'GET'    
    ]
);
Router::add(
    'folders/store',
    [
        'controller' => Controllers\FoldersController::class,
        'action' => 'store',
        'method' => 'POST'    
    ]
);
