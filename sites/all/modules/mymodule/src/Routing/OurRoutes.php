<?php

namespace Drupal\mymodule\Routing;

use Symfony\Component\Routing\Route;

class OurRoutes {
    public function routes() {
        $routes = [];
        //Logic Metier
        $defaults = [
            "_controller" => '\Drupal\mymodule\Controller\FirstPageController::firstPage',
            '_title' => 'Our first page'
        ];
        $requirements = [
            "_permission" => 'our permission',
            "name" => '[A-z]+'
        ];
        $routes['mymodule.firstpage'] = new Route('/mypage/{name}', $defaults, $requirements);

        return $routes;
    }
}