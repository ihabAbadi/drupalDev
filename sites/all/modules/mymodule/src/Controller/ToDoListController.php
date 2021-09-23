<?php 


namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\mymodule\Model\ToDoDTO;
use stdClass;
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
    //Action avec render markup
    // public function list(?string $message) {
    //     $response = "Liste todos";


    //     if($message != null) {
    //         $response.= " $message";
    //     }
    //     $this->renderToDo($response);
    //     return [
    //         "#markup" => $response
    //     ];
    // }

    //Action with template render
    public function list(?string $message) {
        $response = "Liste todos";

        if($message != null) {
            $response.= " $message";
        }
       
        return [
            "#theme" => 'mymodule_theme_todo',
            "#todos" => $this->convertToDTO($this->getTodos()),
            "#message" => $response
        ];
    }


    //A mettre dans un service pour des bonnes pratiques
    private function getTodos() {
        $query = $this->_connection->select(TODO_TABLE, 't');
        $query->fields('t',['title', 'content', 'email']);
        $result = $query->execute();
        return $result;
    }


    //Dans un service de convertion vers ToDoDTO

    private function convertToDTO($todos) {
        $convertedTodos = [];

        foreach($todos as $todo) {
            $convertedTodos[] = new ToDoDTO($todo["title"], $todo["content"]);
        }

        return $convertedTodos;
    }

    private function renderToDo(&$response) { 
        $response = '<div>';
        foreach($this->getTodos() as $element) {
            $response .= "<div>Title : ".$element->title."</div>";
        }
        $response .= '</div>';
    }
}