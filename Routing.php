<?php

require_once 'Controllers//BoardController.php';
require_once 'Controllers//SecurityController.php';
require_once 'Controllers//ErrorController.php';

class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'board' => [
                'controller' => 'BoardController',
                'action' => 'main'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'register' => [
                'controller'=>'SecurityController',
                'action' => 'register'
            ],
            'error' => [
                'controller'=>'ErrorController',
                'action' => 'error'
            ],
            'sessionTimedOut' => [
                'controller'=>'ErrorController',
                'action' => 'sessionTimedOut'
            ],
            'cart' => [
                'controller'=>'BoardController',
                'action' => 'cart'
            ],
            'popular'=> [
                'controller'=>'BoardController',
                'action' => 'popular'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}