<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\mymodule\Service\FirstService;
use Symfony\Component\DependencyInjection\ContainerInterface;
class FirstPageController extends ControllerBase {

    private $_firstService;
    private $_connection;

    public function __construct(FirstService $firstService, Connection $connection){
        $this->_firstService = $firstService;
        $this->_connection = $connection;
    }

    public static function create(ContainerInterface $container)
    {
        return new static($container->get('first_service'), $container->get('database'));
    }
    public function firstPage(?string $name) {

        $query = $this->_connection->select('contact', 'c');
        $query->fields('c',['name']);
        $result = $query->execute();
        $response = '<div>';
        foreach($result as $element) {
            $response .= "<div>".$element->name."</div>";
        }
        $response .= '</div>';

        return [
            "#markup" => $response
        ];
        //Possiblité de gérer les permissions directement dans la partie metier du controlleur
        //if($this->currentUser->hasPermission('our permission')) {
            // return [
            //     "#markup" => t("Bonjour @name",['@name' => $name])
            // ];
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