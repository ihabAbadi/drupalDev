<?php

namespace Drupal\mymodule\Service;

use Drupal\Core\Controller\ControllerBase;
use Drupal\mymodule\MyInterface\HashInterface;

class SuperHashService extends ControllerBase implements HashInterface {

    public function getHash(string $password) {
        return hash('sha512', $password)."super";
    }

    public function getHashType() {
        return "sha512";
    }
}