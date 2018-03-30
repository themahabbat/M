<?php

namespace Routing;

use Views\Compiler;

class Router
{
    private static $routes;

    public function __construct()
    {
        self::$routes = [];
    }

    public static function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    public static function get($url, $function)
    {
        array_push(self::$routes, ["GET", substr($url, 1), $function]);
    }

    public static function post($url, $function)
    {
        array_push(self::$routes, ["POST", substr($url, 1), $function]);
    }

    public static function init()
    {
        $found = false;

        foreach (self::$routes as $route) {

            if ("/{$route[1]}" == self::getCurrentUri() && $_SERVER['REQUEST_METHOD'] == $route[0]) {
                if(is_callable($route[2]))$route[2]->__invoke();;
                $found = true;
                break;
            }
        }
        if(!$found)show_404();

    }

}