<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config);
$errors = [];
$result = $db->query("SELECT * FROM books
WHERE bookname LIKE '{$_POST['search']}%'");
// dd($result);
// $id = $_POST['id'];
view("books/index.view.php", [
    'result' => $result,
]);