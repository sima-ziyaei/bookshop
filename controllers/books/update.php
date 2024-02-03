<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$db = new Database($config);
$errors = [];
$id = $_POST['id'];

$book = $db->query("select * from books where id = {$id} ");

if (!Validator::string($_POST['book'], 1, 60)) {
    $errors['book'] = 'the book name is not valid';
}

if (!empty($errors)) {
    return view('books/edit.view.php', [
        'errors' => $errors,
        'book' => $book,
        'heading' => "Edit Note"
    ]);
}
if ($_SESSION['user'] ?? false) {

    $user = $db->query("SELECT * FROM users WHERE email='{$_SESSION['user']['email']}'");
    if ($user[0]['role'] === 'admin') {
        $updatedBook  = $_POST['book'];
        $id = $_POST['id'];

        $db->query("UPDATE books SET bookname = '{$updatedBook}' WHERE id = {$id}");
    } else {
        $errors['permission'] = 'you are not admin';
    }
}

header('location: /books');


die();
