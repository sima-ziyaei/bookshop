<?php

if($_SESSION['user'] ?? false) {
    header('location: /');
    exit();
}

view('signin/create.view.php');