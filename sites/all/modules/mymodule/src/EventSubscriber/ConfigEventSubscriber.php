<?php

namespace Drupal\mymodule\EventSubscriber;

use Drupal\Core\Config\ConfigEvents;
use Drupal\Core\Config\ConfigCrudEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ConfigEventSubscriber implements EventSubscriberInterface {
    public static function getSubscribedEvents() {
        return 
        [
            ConfigEvents::SAVE => 'configSave'
        ];
    }


    public  function configSave(ConfigCrudEvent $event)
    {
        $config = $event->getConfig();

        var_dump($config);
    }
}