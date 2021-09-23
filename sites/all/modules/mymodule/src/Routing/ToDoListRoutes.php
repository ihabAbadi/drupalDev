<?php

namespace Drupal\mymodule\Routing;

use Symfony\Component\Routing\Route;

class ToDoListRoutes {

    public function routes() {
        $routes = [];

        $routes['mymodule.todo_form'] = new Route('/todolist/form',
            [
                "_form" => 'Drupal\mymodule\Form\ToDoForm',
                "_title" => "Formulaire To do"
            ], 
            [
                "_permission" => 'access content',
            ]
        );

        $routes['mymodule.list_todo'] = new Route('/todolist/{message?}',
            [
                "_controller" => 'Drupal\mymodule\Controller\ToDoListController:list',
                "_title" => "Formulaire To do"
            ], 
            [
                "_permission" => 'access content',
            ]
        );

        return $routes;
    }
}