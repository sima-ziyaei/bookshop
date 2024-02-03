<?php

// return [
//     "/" => "controllers/index.php",
//     "/about" => "controllers/about.php",
//     "/words" => "controllers/words/index.php",
//     "/word" => "controllers/words/show.php",
//     "/words/create" => "controllers/words/create.php",
//     "/contact" => "controllers/contact.php"
// ];

$router->get("/","controllers/index.php");
$router->get("/about","controllers/about.php");
$router->get("/contact","controllers/contact.php");

$router->get("/books","controllers/books/index.php");
$router->post("/books","controllers/books/search.php");
$router->get("/book","controllers/books/show.php");

$router->get("/book/edit","controllers/books/edit.php");
$router->patch("/book","controllers/books/update.php");

$router->delete("/book","controllers/books/destroy.php");

$router->post("/books/create","controllers/books/store.php");
$router->get("/books/create","controllers/books/create.php");

$router->get('/register', 'controllers/registration/create.php');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/signin', 'controllers/signin/create.php');
$router->post('/signin', 'controllers/signin/store.php');

$router->get('/order', 'controllers/order/show.php');
$router->get('/book/order', 'controllers/order/store.php');
$router->post('/book', 'controllers/order/ordering.php');