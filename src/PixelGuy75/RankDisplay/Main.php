<?php

namespace PixelGuy75\RankDisplay;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use _64FF00\PurePerms\commands\SetGroup;

class Main extends PluginBase implements Listener{
	
    public function onEnable(){
    	$this->getLogger()->info("Enabled!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
	
    public function onDisable(){
    	$this->getLogger()->info("Disabled...");
    }
	
    public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$group = $this->getServer()->getPluginManager()->getPlugin("PurePerms")->getUser($player)->getGroup();
		$groupname = $group->getName();
        $displayrank = "Rank: [" . $groupname . "] \n" . $player->getDisplayName();
        $player->setNameTag($displayrank);
    }
	
    public function onRankChange(SetGroup $event){
		$player = $event->getPlayer();
		$group = $this->getServer()->getPluginManager()->getPlugin("PurePerms")->getUser($player)->getGroup();
		$groupname = $group->getName();
        $displayrank = "Rank: [" . $groupname . "] \n" . $player->getDisplayName();
        $player->setNameTag($displayrank);
    }
}
