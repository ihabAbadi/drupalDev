<?php

namespace Drupal\mymodule\Routing;

use Symfony\Component\Routing\Route;

class OurRoutes {
    public function routes() {
        $methods = ['\FirstPageController::firstPage' => '/mypage/{name?}',
                 '\FirstPageController::pageWithService' => '/page-service',
                 '\HashController::hashPage' => '/hash/{password}'
                ];
        $routes = [];
        //Logic Metier
        foreach($methods as $key=>$value) {
            $defaults = [
                "_controller" => "\Drupal\mymodule\Controller$key",
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