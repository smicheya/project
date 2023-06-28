<?php

require_once('../vendor/autoload.php');

use app\Database;

$db = new Database([
    'host' => 'localhost',
    'dbname' => 'projectbd',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8'
]);




