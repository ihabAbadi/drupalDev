<?php 

namespace Drupal\mymodule\Plugin\Block;

use Drupal;
use Drupal\Core\Block\BlockBase;


/**
 * @Block(
 *      id = "mymodule.test_block",
 *      category = "System",
 *      admin_label="Notre block"     
 * )
 */
class TestBlock extends BlockBase {

    public function build()
    {
        $toDoForm = \Drupal::formBuilder()->getForm("Drupal\mymodule\Form\ToDoForm");
        return $toDoForm;
    }
}