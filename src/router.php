<?php
namespace AHT;

use AHT\Request;

class Router
{
    public static function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/mvc/src/") {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 4);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }

    }
}
