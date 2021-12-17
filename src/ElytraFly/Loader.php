<?php

namespace ElytraFly;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\entity\EntityArmorChangeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;

class Loader extends PluginBase implements Listener
{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		if(!$this->getDescription()->getAuthors() === "KRUNCH7SHooT"){
			$this->getPluginLoader()->disablePlugin($this);
		}
	}
	
	public function onArmor(EntityArmorChangeEvent $ev){
		$sender = $ev->getEntity();
		
		$item = $ev->getNewItem();
		if($item->getId() == 444){
			$sender->setAllowFlight(true);
			$sender->setFlying(true);
		} else {
			$sender->setAllowFlight(false);
			$sender->setFlying(false);
		}
		if(!$item->getId() == 444){
			$sender->setAllowFlight(false);
			$sender->setFlying(false);
		}
	}
}
