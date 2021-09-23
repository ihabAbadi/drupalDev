<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SimpleForm extends FormBase {

    private $_data;
    public function getFormId()
    {
        //Un id unique par formulaire
        return 'mymodue.simpleform';
    }

    public function __construct(Connection $data)
    {
        $this->_data = $data;
    }


    public static function create(ContainerInterface $container) {
        return new static($container->get('database'));
    }

    
    public function buildForm(array $form, FormStateInterface $form_state) {
        //Construction de notre formulaire.
        $form["titre"] = [
            "#title" => "Titre du champ",
            "#type" => 'textfield',
        ];
        $form["actions"]["submit"] = [
            '#type' => 'submit',
            '#value' => 'enregistrer',
            "#button_type" => 'warning'
        ];
        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state) {
        //Pour récupérer les valeurs du formulaire, on utilise le form_state avec la méthode getValue
        if(strlen($form_state->getValue("titre")) < 10) {
            $form_state->setErrorByName("titre", "Merci de saisir un titre avec 10 caractères min");
        }
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        // echo "<pre>";
        // var_dump($form);
        // echo "</pre>";

        //Executer une logique
        $query = $this->_data->insert('contact');
        $query->fields([
            'name' => $form_state->getValue("titre")
        ])->execute();
        $form_state->setRedirect('mymodule.\FirstPageController::firstPage', ['name' => $form_state->getValue("titre")]);
    }
}