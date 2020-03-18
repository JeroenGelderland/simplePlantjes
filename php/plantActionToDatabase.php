<?php
include_once('classes/Database.php');

$str_json = file_get_contents("php://input");
$plantAction = json_decode($str_json);

foreach ($plantAction->toPlant as $plant){
    $sql = printf("DELETE FROM `plant` WHERE id=%u;", (int)$plant);
    Database::runInsert($sql);
    header("Location: plantjesLijst.php");

}