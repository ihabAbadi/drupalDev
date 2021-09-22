<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class FirstPageController extends ControllerBase {

    public function firstPage(string $name) {
        //Possiblité de gérer les permissions directement dans la partie metier du controlleur
        // if($this->currentUser->hasPermission('our permission')) {
        //     return [
        //         "#markup" => t("Bonjour @name",['@name' => $name])
        //     ];
        // }
        return [
            "#markup" => t("Bonjour @name",['@name' => $name])
        ];        
    }

}