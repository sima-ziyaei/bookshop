<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config);
$errors = [];
$id = $_POST['id'];

$book = $db->query("select * from books where id = {$id} ");

$count  = $_POST['book'];
$bookid = $_POST['id'];


if ($_SESSION['user'] ?? false) {

    $user = $db->query("SELECT * FROM users WHERE email='{$_SESSION['user']['email']}'");

    $db->query(
        'INSERT INTO orders(count, bookid, userid) VALUES(:count, :bookid, :userid )',
        [
            'count' => $count,
            'bookid' => $bookid,
            'userid' => $user[0]['id']
        ]
    );
    $leftbooks = $book[0]['inventory'] - $count;
    $db->query("UPDATE books SET inventory = '{$leftbooks}' WHERE id = {$book[0]['id']}");
}


header('location: /books');

die();
