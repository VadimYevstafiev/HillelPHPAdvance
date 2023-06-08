<?php

const DSN = "pgsql:host=db;dbname=test";

const USER = "postgres";

const PASS = "example";

$pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

$query = $pdo->prepare("SELECT * FROM students");

$query->execute();

echo '<pre>' . print_r($query->fetchAll(), true) . '</pre>';
?>