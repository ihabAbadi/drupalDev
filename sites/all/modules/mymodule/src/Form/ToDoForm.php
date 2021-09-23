<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\mymodule\Service\ValidatorService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ToDoForm extends FormBase {

    private $_validator;

    public function __construct(ValidatorService $validator)
    {
        $this->_validator = $validator;
    }
    public static function create(ContainerInterface $container)
    {
        return new static($container->get('mymodule.validator'));
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
        $form["actions"]["submit"] = [
            '#type' => 'submit',
            '#value' => 'enregistrer',
            "#button_type" => 'primary'
        ];
        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        if(!$this->_validator->isContentValid($form_state->getValue("content"))) {
            $form_state->setErrorByName('content', 'Merci de mettre un todo avec min 10 caractères');
        }
    }


    public function submitForm(array &$form, FormStateInterface $form_state)  {
        $form_state->setRedirect('mymodule.list_todo', ['message' => "Todo ajouté"]);
    }
}