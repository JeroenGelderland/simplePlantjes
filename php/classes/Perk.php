<?php
include_once("Database.php");

class Perk
{
    public $id;
    public $naam;
    public $red;
    public $green;
    public $blue;
    public $startX;
    public $startY;
    public $endX;
    public $endY;
    public $plantjes;


    public function save(){
        $this->id = Database::getPerkId();
        $sql = sprintf("INSERT INTO `perk` (`id`,`naam`,`r`,`g`,`b`,`startX`,`startY`,`endX`,`endY`) VALUES (%u, '%s', %u, %u, %u, %u, %u, %u, %u)", $this->id, $this->naam, $this->red, $this->green, $this->blue, $this->startX, $this->startY, $this->endX, $this->endY);
        Database::runInsert($sql);
    }
}