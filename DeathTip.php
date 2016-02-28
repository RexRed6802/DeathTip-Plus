# DeathTip-Plus

<?php

namespace DeathTip;

use pocketmine\entity\Effect;
use pocketmine\inventory\PlayerInventory;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerDeathEvent;
use
pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\tile\Tile;
use pocketmine\tile\Sign;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use onebone\economyapi\EconomyAPI;

class DeathTip extends PluginBase implements Listener{

public function onLoad(){
		$this->getLogger()->info(TextFormat::RED . "死亡連死提示啟動中，RexRed6802版權所有，請勿侵犯.重製.解包");
	}

public function onJoin(PlayerJoinEvent $event){    //不要在意
		$player = $event->getPlayer();
		$player->sendMessage("RexRed6802");
 }

public function onEnable(){
$this->getLogger()->info(TextFormat::DARK_GREEN . "DeathTip死亡提示，啟動完畢");
@mkdir($this->getDataFolder());
			$this->cfg=new Config($this->getDataFolder()."config.yml",Config::YAML,array());
       if($this->getServer()->getPluginManager()->getPlugin("EconomyAPI"))
				{
					$this->getLogger()->info("—————感謝使用DeathTip—————");
					$this->getLogger()->info("—————請注意：請勿盜賣本插件—————");
					$cs = true;
					$this->eco = $cs;
				}else{
					$this->getLogger()->info("EconomyAPI未找到，插件无法使用 !");
					$cs = false;
					$this->eco = $cs;
}
		  $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

public function onPlayerDeath(PlayerDeathEvent $event) {
$p = $event->getEntity();
if(isset($this->deaths[$p->getName()])){
$this->deaths[$p->getName()]++;
}else{ 
$this->deaths[$p->getName()] = 1;
}
if($this->deaths[$p->getName()] == 2 ){
$this->getServer()->broadcastMessage('玩家' .$p->getName(). '連死了2次');
}
if($this->deaths[$p->getName()] == 3 ){
$this->getServer()->broadcastMessage('玩家' .$p->getName(). '連死了3次');
}
if($this->deaths[$p->getName()] == 4 ){
$this->getServer()->broadcastMessage('玩家' .$p->getName(). '連死了4次');
}
if($this->deaths[$p->getName()] == 5){
$this->getServer()->broadcastMessage('玩家' .$p->getName(). '連死了5次');
}
if($this->deaths[$p->getName()] == 6){
$this->getServer()->broadcastMessage('玩家' .$p->getName(). '連死了6次');
}
if($this->deaths[$p->getName()] == 7){
$this->getServer()->broadcastMessage('玩家' .$p->getName(). '連死了7次');
}
if($this->deaths[$p->getName()] >= 8 ){
$this->getServer()->broadcastMessage('玩家' .$p->getName(). '連死了8次以上');
}
$cause = $event->getEntity()->getLastDamageCause()->getCause();
			if($cause == 1 or $cause == 2 ){ //Killer is an entity
				//Get Killer Entity
				$killer = $event->getEntity()->getLastDamageCause()->getDamager();
if(isset($this->kills[$killer->getName()])){
$this->kills[$killer->getName()]++;
}else{
$this->kills[$killer->getName()] = 1;
if($this->deaths[$p] >= 2){
$this->getServer()->broadcastMessage('玩家' .$p->getName. '終止了連殺');
$this->deaths[$killer->getName()] = 0;
}
}
}
}
}
