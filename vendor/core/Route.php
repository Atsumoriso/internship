<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 28.06.16
 * Time: 14:17
 */

namespace Vendor\Core;

class Route
{
    public static function start()
    {
        $controllerName = 'Home';
        $actionName = 'ActionIndex';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if ( !empty($routes[2]) )
        {
            $controllerName = $routes[2];
        }

        if ( !empty($routes[3]) )
        {
            $actionName = $routes[3];
        }

        $controllerName = "App\\Cms\\Src\\Controller\\" . $controllerName . 'Controller';

        $controller = new $controllerName;

        if(method_exists($controller, $actionName))
        {
            $controller->$actionName();
        }
    }
}