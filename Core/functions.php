<?php 

// var_dump(["dfsdfsdf"]);

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
};
// dd($_SERVER);

// echo $_SERVER["REQUEST_URI"];

function urlIs($value) {
    return $_SERVER["REQUEST_URI"] === $value;
};

function authorize ($condition){
    if(!$condition){
        abort(Response::FORBIDDEN);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = []){
    extract($attributes);
    require base_path('views/' . $path);
}