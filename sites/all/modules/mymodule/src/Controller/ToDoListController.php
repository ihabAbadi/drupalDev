<?php 


namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ToDoListController extends ControllerBase {

    private $_connection;

    public function __construct(Connection $connection)
    {
        $this->_connection = $connection;
    }

    public static function create(ContainerInterface $container)
    {
        return new static($container->get('database'));
    }

    public function list(?string $message) {
        $response = "Liste todos";


        if($message != null) {
            $response.= " $message";
        }
        $this->renderToDo($response);
        return [
            "#markup" => $response
        ];
    }

    private function renderToDo(&$response) {
        $query = $this->_connection->select(TODO_TABLE, 't');
        $query->fields('t',['title', 'content', 'email']);
        $result = $query->execute();
        $response = '<div>';
        foreach($result as $element) {
            $response .= "<div>Title : ".$element->title."</div>";
        }
        $response .= '</div>';
    }
}