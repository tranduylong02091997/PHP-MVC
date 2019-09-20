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
        call_user_func_array([$controller, $this->request->action], $this->request->params);// gọi hàm của đối tượng với 1 loạt tham số truyền trong mảng. 
    }

    public function loadController()
    {
        $name = 'AHT\\Controllers\\' . ucfirst($this->request->controller) . "Controller";
        // $file = "AHT\\Controllers\\" . $name;
        $controller = new $name();
        return $controller;
    }

}
