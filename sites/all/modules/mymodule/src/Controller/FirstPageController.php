<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\mymodule\Service\FirstService;
use Symfony\Component\DependencyInjection\ContainerInterface;
class FirstPageController extends ControllerBase {

    private $_firstService;

    public function __construct(FirstService $firstService){
        $this->_firstService = $firstService;
    }

    public static function create(ContainerInterface $container)
    {
        return new static($container->get('first_service'));
    }
    public function firstPage(string $name) {
        //Possiblité de gérer les permissions directement dans la partie metier du controlleur
        //if($this->currentUser->hasPermission('our permission')) {
            return [
                "#markup" => t("Bonjour @name",['@name' => $name])
            ];
        //}
        // return [
        //     "#markup" =>\Drupal::formBuilder()->getForm("Drupal\mymodule\Form\SimpleForm")
        // ];  
        //return \Drupal::formBuilder()->getForm("Drupal\mymodule\Form\SimpleForm");
    }


    public function pageWithService() {
        //$service = new FirstService();
        $data = $this->_firstService->getDataFromService();
        return [
            "#markup" => "Data from service $data"
        ];
    }
}