<?php
include_once("Plant.php");


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

        $result = $conn->query($sql);
        $conn->close();
    }

    public static function getPrimary(){
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
                $plantje = new Plant();
                $plantje->id = $row["id"];
                $plantje->zaad = $row["zaad"];
                $plantje->naam = $row["naam"];
                $plantje->kiemDatum = $row["kiemDatum"];
                $plantje->groeitijd = $row["groeitijd"];
                $plantje->waterFreq = $row["waterFreq"];
                $plantje->waterBehoefte = $row["waterBehoefte"];
                $plantje->voedingsFreq = $row["voedingsFreq"];

                array_push($plantjes, $plantje);
            }
        }
        return $plantjes;
    }

    public static function getJsonPlantjes(){
        echo json_encode(self::loadPlantjes());
    }
}