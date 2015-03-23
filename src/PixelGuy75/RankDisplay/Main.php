<?php

namespace PixelGuy75\RankDisplay;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use _64FF00\PurePerms\commands\SetGroup;

class Main extends PluginBase implements Listener{
	
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
	
    public function onDisable(){
    }
	
    public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$group = $this->getServer()->getPluginManager()->getPlugin("PurePerms")->getUser($player)->getGroup();
		$groupname = $group->getName();
        $displayrank = "Rank: [" . $groupname . "]\n" . $player->getDisplayName();
        $player->setNameTag($displayrank);
    }
	
    public function onRankChange(SetGroup $event){
		$player = $event->getPlayer();
		$group = $this->getServer()->getPluginManager()->getPlugin("PurePerms")->getUser($player)->getGroup();
		$groupname = $group->getName();
        $displayrank = "[" . $groupname . "] " . $player->getDisplayName();
        $player->setNameTag($displayrank);
    }
}
