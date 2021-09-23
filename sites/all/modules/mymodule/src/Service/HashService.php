<?php

namespace Drupal\mymodule\Service;

use Drupal\Core\Controller\ControllerBase;
use Drupal\mymodule\MyInterface\HashInterface;

class HashService extends ControllerBase implements HashInterface {

    private $typeCrypto;
    public function __construct($type)
    {
        $this->typeCrypto = $type;
    }

    public function getHash(string $password) {
        return hash($this->typeCrypto, $password)."normal";
    }

    public function getHashType() {
        return $this->typeCrypto;
    }
    

    public function startLog($file) {
        echo "Log in ".$file;
    }

}