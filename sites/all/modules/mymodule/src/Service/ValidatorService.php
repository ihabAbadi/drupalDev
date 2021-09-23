<?php

namespace Drupal\mymodule\Service;

class ValidatorService  {
    public function isContentValid(string $content) {
        return strlen($content) >= 10;
    }
}