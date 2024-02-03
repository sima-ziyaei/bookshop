<?php

use Core\Database;

// spl_autoload_register( function ($class){
//     require base_path("Core/{$class}.php");
//  });
 

$config = require base_path("config.php");

$db = new Database($config);

$url = $_SERVER["REQUEST_URI"];

$path = parse_url($url)['query'];

$books = $db->query("select * from books");

view("books/index.view.php", [
    'heading' => 'My Books',
    'books' => $books,
]);