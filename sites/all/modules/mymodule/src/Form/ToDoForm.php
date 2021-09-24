<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\mymodule\Service\ValidatorService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ToDoForm extends FormBase {

    private $_validator;
    private $_connection;

    public function __construct(ValidatorService $validator, Connection $connection)
    {
        $this->_validator = $validator;
        $this->_connection = $connection;
    }
    public static function create(ContainerInterface $container)
    {
        return new static($container->get('mymodule.validator'), $container->get('database'));
    }
    public function getFormId() {
        return 'mymodule.todo_form';
    }
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form["title"] = [
            "#title" => "Le nom du todo",
            "#type" => 'textfield',
        ];
        $form["email"] = [
            "#title" => "L'email de la personne qui gere la todo",
            "#type" => 'email',
        ];
        $form["content"] = [
            "#title" => "le contenu de la todo",
            "#type" => 'textarea',
        ];
        $form["message"] = [
            "#type" => "markup",
            "#markup" => "<div id='result_message'></div>"
        ];
        $form["actions"]["submit"] = [
            '#type' => 'submit',
            '#value' => 'enregistrer',
            "#button_type" => 'primary',
            "#ajax" => [
                "callback" => "::submitAjax"
            ]
        ];
        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        if(!$this->_validator->isContentValid($form_state->getValue("content"))) {
            $form_state->setErrorByName('content', 'Merci de mettre un todo avec min 10 caractères');
        }
    }


    public function submitAjax(array &$form, FormStateInterface $form_state) {
        $query = $this->_connection->insert(TODO_TABLE);
        $query->fields([
            "title" => $form_state->getValue('title'),
            "content" => $form_state->getValue('content'),
            "email" => $form_state->getValue('email'),
        ])->execute();

        $response = new AjaxResponse();
        $response->addCommand(new HtmlCommand('#result_message', 'To do ajouté'));    
        return $response;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)  {

        $query = $this->_connection->insert(TODO_TABLE);
        $query->fields([
            "title" => $form_state->getValue('title'),
            "content" => $form_state->getValue('content'),
            "email" => $form_state->getValue('email'),
        ])->execute();
        $form_state->setRedirect('mymodule.list_todo', ['message' => "Todo ajouté"]);
    }
}