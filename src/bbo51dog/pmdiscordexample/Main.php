<?php

namespace bbo51dog\pmdiscordexample;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

    protected function onEnable(): void {
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
            "url" => "https://discord.com/api/webhooks/000000/xxxxxx",
        ]);
        $config->save();
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($config->get("url")), $this);
    }
}