<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config);
$errors =[];
if ($_SESSION['user'] ?? false) {

    $user = $db->query("SELECT * FROM users WHERE email='{$_SESSION['user']['email']}'");
    if ($user[0]['role'] === 'admin') {
        $db->query('delete from books where id = :id', [
            'id' => $_GET['id']
        ]);
        header('location: /books');
    } else {
        $errors['permission'] = 'you are not admin';
    }
}


exit();
