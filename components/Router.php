<?php
/**
 * Created by PhpStorm.
 * UserController: maxim
 * Date: 18.08.17
 * Time: 21:30
 */

namespace Scraps;

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = $_SERVER['DOCUMENT_ROOT'] . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    public function run()
    {
        $uri = $this->getUri();

        if (empty($uri)) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/UserController.php';
            $controllerObj = new UserController();
            $controllerObj->authorization();
            return;
        }

        foreach ($this->routes as $name => $path) {
            if (preg_match("|$name|", $uri)) {
                $segments = explode('/', preg_replace("|$name|", $path, $uri));
                $controller = ucfirst(array_shift($segments)) . 'Controller';
                $action = array_shift($segments);
                $scrapId = array_shift($segments);

                $controllerFile = $_SERVER['DOCUMENT_ROOT'] . '/controllers/' . $controller . '.php';
                $controller = '\Scraps\\' . $controller;

                if (file_exists($controllerFile)) {
                    require_once $controllerFile;

                    $controllerObj = new $controller();
                    $result = $controllerObj->$action($scrapId);

                    break;
                }
            }
        }
    }

    private function getUri()
    {
        /*if (isset($_SESSION['user'])) {
            return 'scraps';
        }*/
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
}