<?php
require_once('Database.php');

class Plant
{
    public $id;
    public $zaad;
    public $naam;
    public $plantDatum;
    public $waterFreq;
    public $waterBehoefte;
    public $voedingsFreq;

    public function save(){
        $this->id = Database::getPrimaryPlant();

        $sql = "INSERT INTO `plant` (`id`,`zaad`,`naam`,`plantDatum`,`waterFreq`,`waterBehoefte`,`voedingsFreq`) VALUES(".$this->id.",".$this->zaad.",'".$this->naam."',".$this->plantDatum.",".$this->waterFreq.",'".$this->waterBehoefte."',".$this->voedingsFreq.")";
        Database::runInsert($sql);
        echo $sql;
    }
}

