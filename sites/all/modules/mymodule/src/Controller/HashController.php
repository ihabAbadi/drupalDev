<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\mymodule\MyInterface\HashInterface;
// use Drupal\mymodule\Service\HashService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class HashController extends ControllerBase {
    private $_hashService;
    
    public function __construct(HashInterface $hashService){
        $this->_hashService = $hashService;
    }
    
    public static function create(ContainerInterface $container){
        return new static($container->get('hash_password'));
    }

    public function hashPage(string $password) {
        $hash = $this->_hashService->getHash($password);
        return [
            "#markup" => "The ".$this->_hashService->getHashType()." hash for $password is : $hash"
        ];
    }
}