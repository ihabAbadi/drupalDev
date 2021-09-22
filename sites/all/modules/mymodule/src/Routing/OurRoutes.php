<?php

namespace Drupal\mymodule\Routing;

use Symfony\Component\Routing\Route;

class OurRoutes {
    public function routes() {
        $methods = ['firstPage' => '/mypage/{name}', 'pageWithService' => '/page-service'];
        $routes = [];
        //Logic Metier
        foreach($methods as $key=>$value) {
            $defaults = [
                "_controller" => "\Drupal\mymodule\Controller\FirstPageController::$key",
                '_title' => 'page '.$key
            ];
            $requirements = [
                "_permission" => 'our permission',
                "name" => '[A-z]+'
            ];
            $routes["mymodule.$key"] = new Route($value, $defaults, $requirements);
        }
        
        return $routes;
    }
}