<?php

namespace Drupal\mymodule\Event;

use Drupal\Component\EventDispatcher\Event;
use Drupal\user\UserInterface;

class UserLoginEvent extends Event {
    const LOGIN_EVENT = 'login_event';

    private $account;
    
    public function __construct(UserInterface $user)
    {
        $this->account = $user;
    }
}