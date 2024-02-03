<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config);
$users = [];
$books = [];
if ($_SESSION['user'] ?? false) {

    $user = $db->query("SELECT * FROM users WHERE email='{$_SESSION['user']['email']}'");
    if ($user[0]['role'] === 'admin') {
        $orders = $db->query('SELECT * FROM orders');

        $res = $db->query("SELECT
        users.name,
        books.bookname,
        orders.count
        FROM orders
        JOIN users
        ON users.id = orders.userid
        JOIN books
        ON orders.bookid = books.id");

    } else {
        $orders = $db->query("SELECT * FROM orders WHERE userid = {$user[0]['id']}");
        $res = $db->query("SELECT
        users.name,
        books.bookname,
        orders.count
        FROM orders
        JOIN users
        ON users.id = {$user[0]['id']}
        JOIN books
        ON orders.bookid = books.id");
    }
    // dd($res);
}

view("order/show.view.php", [
    'heading' => 'Orders',
    'res' => $res
]);
