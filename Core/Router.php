<?php

namespace Core;

class Router
{

    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);

    }

    public function delete($uri, $controller)
    {

        $this->add('DELETE', $uri, $controller);

    }

    public function patch($uri, $controller)
    {

        $this->add('PATCH', $uri, $controller);

    }

    public function put($uri, $controller)
    {

        $this->add('PUT', $uri, $controller);

    }

    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    public function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/$code.php");
        die();
    }
}


// if($url === "/"){
//     require("controllers/index.php");
// } else if($url === "/about"){
//     require("controllers/about.php");
// } else if($url === "/contact"){
//     require("controllers/contact.php");
// };

// $url = $_SERVER["REQUEST_URI"];

// $path = parse_url($url)['path'];

// $routes = [
//     "/" => "controllers/index.php",
//     "/about" => "controllers/about.php",
//     "/words" => "controllers/words/index.php",
//     "/words/create" => "controllers/words/create.php",
//     "/word" => "controllers/words/show.php",
//     "/contact" => "controllers/contact.php"
// ];

// function routeToController($uri, $routes) {
//     if(array_key_exists($uri, $routes)) {
//         require base_path($routes[$uri]);
//     } else {
//         abort();
//     }
// }





// if (array_key_exists($path, $routes)) {
//     require $routes[$path];
// } else {
//     abort();
// }
