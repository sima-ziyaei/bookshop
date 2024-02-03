<?php

use Core\Validator;
use Core\Database;


require base_path("Core/Validator.php");
$config = require base_path("config.php");
$db = new Database($config);
// $validator = new Validator();
$errors = [];

if (!Validator::string($_POST['bookname'], 1, 15)) {
    $errors['book'] = 'the book is not valid';
}

if (!empty($errors)) {
    return view("books/create.view.php", [
        'heading' => 'Create Book',
        'errors' => $errors
    ]);
}


$db->query(
    'INSERT INTO books(bookname) VALUES(:bookname)',
    [
        'bookname' => $_POST['bookname']
    ]
);
$res = $db->lastInsertId();
header("Location: /book?id=$res");
