<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$db = new Database($config);

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];

if (!Validator::email($email)) {
    $errors['email'] = 'please provide a valid email';
}


if (!Validator::string($email, 7, 25)) {
    $errors['password'] = 'please provide a valid password';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// dd($address);
$user = $db->query("SELECT * FROM users WHERE email='{$email}'");

// dd($user);

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query("INSERT INTO users(email, password, name, address, role) VALUES('{$email}', {$password}, '{$name}', '{$address}', 'user')");

    // $_SESSION['logged_in'] = true;
    $_SESSION['user'] = [
        'email' => $email,
        'name' => $name
    ];
// dd($_SESSION['user']['name']);
    header('location: /');
    exit();
}
