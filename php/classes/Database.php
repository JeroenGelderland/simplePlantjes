<?php
include_once("Plant.php");
include_once('Perk.php');


const USERNAME = "root";
const HOST = "localhost";
const PASSWORD = "";
const DB_NAME = "plantenSimple";

const LAST_ID_QUERY = "SELECT LAST_INSERT_ID()";

final class Database{



    public static function runQuery($sql){
        $conn = new mysqli(HOST, USERNAME , PASSWORD, DB_NAME);

        if ($conn->connect_error) {
            echo "connection failed";
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public static function runInsert($sql){

        $conn = new mysqli(HOST, USERNAME , PASSWORD, DB_NAME);
        if ($conn->connect_error) {
            echo "connection failed";
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->query($sql);
        $conn->close();
    }

    public static function getPrimaryPlant(){
        $result =  self::runQuery("SELECT MAX(id)+1 as id FROM `plant`");
        $key = $result->fetch_assoc()["id"];
        if($key == null){
            $key = 0;
        }
        return $key;
    }

    public static function loadPlantjes()
    {
        $plantjes = [];

        $sql = "SELECT * FROM `plant`;";

        $result = self::runQuery($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($plantjes, self::createPlantje($row));
            }
        }
        return $plantjes;
    }

    public static function loadPlantjePlantjes(){
        $plantjes = [];

        $sql = "SELECT * FROM `plant` WHERE `perk` IS NULL;";

        $result = self::runQuery($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($plantjes, self::createPlantje($row));
            }
        }
        return $plantjes;
    }

    public static function getPerkId(){
        $result =  self::runQuery("SELECT MAX(id)+1 as id FROM `perk`");
        $key = $result->fetch_assoc()["id"];
        if($key == null){
            $key = 0;
        }
        return $key;
    }

    public static function getJsonPlantjes(){
        echo json_encode(self::loadPlantjePlantjes());
    }

    public static function loadPerks(){
        $perks = [];

        $sql = "SELECT * FROM `perk`";

        $result = self::runQuery($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $perk = new Perk();

                $perk->id = $row['id'];
                $perk->naam = $row['naam'];
                $perk->red = $row['r'];
                $perk->green = $row['g'];
                $perk->blue = $row['b'];
                $perk->startX = $row['startX'];
                $perk->startY = $row['startY'];
                $perk->endX = $row['endX'];
                $perk->endY = $row['endY'];
                $perk->plantjes = self::loadPerkPlants($perk->id);

                array_push($perks, $perk);
            }
        }

        return $perks;
    }

    public static function loadPerkPlants($perkId){
        $plantjes = [];
        $sql = sprintf("SELECT * FROM `plant` WHERE `perk` = %u;", $perkId);
        $result = Database::runQuery($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($plantjes, self::createPlantje($row));
            }
        }

        return $plantjes;
    }

    public static function getJsonPerk(){
        echo json_encode(self::loadPerks());
    }

    public static function createPlantje($row){
        $plantje = new Plant();
        $plantje->id = $row["id"];
        $plantje->zaad = $row["zaad"];
        $plantje->naam = $row["naam"];
        $plantje->plantDatum = $row["plantDatum"];
        $plantje->waterFreq = $row["waterFreq"];
        $plantje->waterBehoefte = $row["waterBehoefte"];
        $plantje->voedingsFreq = $row["voedingsFreq"];
        return $plantje;
    }

}