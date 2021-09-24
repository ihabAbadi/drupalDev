<?php

namespace Drupal\mymodule\EventSubscriber;

use Drupal\mymodule\Event\UserLoginEvent;
use Drupal\user\UserInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LoginEventSubscriber implements EventSubscriberInterface {
    public static function getSubscribedEvents() {
        return 
        [
            UserLoginEvent::LOGIN_EVENT => 'onLogin'
        ];
    }


    public  function onLogin($user)
    {
       // var_dump($user);
    }
}