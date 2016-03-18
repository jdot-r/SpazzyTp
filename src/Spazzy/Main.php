<?php

namespace Spazzy;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat as Color;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\level\particle\PortalParticle;
use pocketmine\level\sound\EndermanTeleportSound;

class Main extends PluginBase implements Listener {
	
	public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onLoad(){
		$this->getLogger()->info(Color::GREEN ."SpazzyTp has been successfully enabled!");
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "pos":
				if($sender instanceof Player){
					$playerX = $sender->getX();
                			$playerY = $sender->getY();
                			$playerZ = $sender->getZ();
                			
                			$outX = round($playerX,1);
                			$outY = round($playerY,1);
                			$outZ = round($playerZ,1);

                			$playerLevel = $sender->getLevel()->getName();

                			$sender->sendMessage(Color::BLUE . " x:" . Color::GREEN . $outX . ", y:" . Color::YELLOW . $outY . ", z:" . Color::GREEN . $outZ . ". On: " . Color::AQUA . $playerLevel);
					return true;
				}else{
					$sender->sendMessage(Color::RED ."This command only works". Color::YELLOW ."in". Color::WHITE ."-". Color::YELLOW ."game!");
            			}
			}
		}    
	 public function onTeleport(EntityTeleportEvent $event){
        $entity = $event->getEntity();
        $fizz = new EndermanTeleportSound($entity);
        $particle = new PortalParticle($entity);
        $entity->getLevel()->addSound($fizz);
        $entity->getLevel()->addParticle($particle);
	 }
	
	 public function onDisable(){
        $this->getLogger()->info(Color::RED ."SpazzyTp has been successfully disabled!");
	 }
} // Adding more creative things soon, including visible teleportation particles!
