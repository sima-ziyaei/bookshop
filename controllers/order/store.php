<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config);

$id = $_GET['id'];

$book = $db->query("select * from books where id = {$id} ");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    dd($_POST);
    // $db->query(
    //     'INSERT INTO orders(translation, word_id) VALUES(:translation, :word_id)',
    //     [
    //         'translation' => $_POST['translation'],
    //         'word_id' => (int)$id
    //     ]
    // );
}

view("order/store.view.php", [
    'heading' => 'Order Book',
    'book' => $book
]);