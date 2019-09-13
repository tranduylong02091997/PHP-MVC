<?php
namespace AHT;

use AHT\Request;
use AHT\Router;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();

        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->action], $this->request->params);//return object namespace va cac ham
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = "AHT\\Controllers\\" . $name;
        $controller = new $file();
        return $controller;
    }

}
