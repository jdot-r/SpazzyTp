<?php

namespace Spazzy;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\level\sound\EndermanTeleportSound;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onTeleport(EntityTeleportEvent $event){
        $entity = $event->getEntity();
        $fizz = new EndermanTeleportSound($entity);
        $entity->getLevel()->addSound($fizz);
    }
}
