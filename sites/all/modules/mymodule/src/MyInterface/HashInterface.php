<?php

namespace Drupal\mymodule\MyInterface;

interface HashInterface {
    function getHash(string $password);
}