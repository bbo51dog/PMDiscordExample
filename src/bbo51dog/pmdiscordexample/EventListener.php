<?php

namespace bbo51dog\pmdiscordexample;

use bbo51dog\pmdiscord\connection\Webhook;
use bbo51dog\pmdiscord\element\Content;
use bbo51dog\pmdiscord\element\Embed;
use bbo51dog\pmdiscord\element\Embeds;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class EventListener implements Listener {

    private string $url;

    /**
     * @param string $url
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $content = new Content();
        $content->setText("Player Joined");
        $embeds = new Embeds();
        $embed = (new Embed())
            ->setTitle("JOIN")
            ->setDesc($player->getName() . " joined the server")
            ->addField("World", $player->getWorld()->getDisplayName())
            ->setAuthorName("Example Server");
        $embeds->add($embed);
        Webhook::create($this->url)
            ->add($content)
            ->add($embeds)
            ->send();
    }
}