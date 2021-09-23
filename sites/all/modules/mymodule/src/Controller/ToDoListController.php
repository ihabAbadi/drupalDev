<?php 


namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class ToDoListController extends ControllerBase {
    public function list(?string $message) {
        $response = "Liste todos";
        if($message != null) {
            $response.= " $message";
        }
        return [
            "#markup" => $response
        ];
    }
}