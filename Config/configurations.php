<?php

return [
    'db' => [
        'host' => getenv('DB_HOST') ?? null,
        'user' => getenv('DB_USER') ?? null,
        'password' => getenv('DB_PASSWORD') ?? null,
        'database' => getenv('DB_NAME') ?? null,
    ]
];
