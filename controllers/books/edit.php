<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config);

$id = $_GET['id'];

$book = $db->query("select * from books where id = {$id} ");


view("books/edit.view.php", [
    'heading' => 'Edit Book',
    'errors'=> [],
    'book' => $book
]);