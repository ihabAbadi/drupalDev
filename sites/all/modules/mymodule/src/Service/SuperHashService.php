<?php

namespace Drupal\mymodule\Service;

use Drupal\Core\Controller\ControllerBase;
use Drupal\mymodule\MyInterface\HashInterface;

class SuperHashService extends ControllerBase implements HashInterface {

    public function getHash(string $password) {
        return hash('sha256', $password)."super";
    }

    
}