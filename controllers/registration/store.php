<?php

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$db = new Database($config);

$email = $_POST['email'];
$password = $_POST['password'];

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


$user = $db->query("SELECT * FROM users WHERE email='{$email}'");


if ($user) {
    $_SESSION['user'] = [
        'email' => $email
    ];
    header('location: /');
    exit();
} else {
    $errors['register'] = 'you do not have account. please <a href="/signin" class="text-blue-500"> sign in</a>';
view('registration/create.view.php',[
    'errors' => $errors
]);

    // header('location: /signin');
    // $db->query("INSERT INTO users(email, password) VALUES('{$email}', {$password})");

    // // $_SESSION['logged_in'] = true;
    // $_SESSION['user'] = [
    //     'email' => $email
    // ];

    // header('location:‌/');
    // exit();
}
