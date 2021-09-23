<?php

namespace Drupal\mymodule\Model;

class ToDoDTO {
    
    private $title;

    private $content;

    public function __construct($t, $c)
    {
        $this->setTitle($t);
        $this->setContent($c);
    }
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent() {
        return $this->title;
    }

    public function setContent($content) {
        $this->content = $content;
    }
}