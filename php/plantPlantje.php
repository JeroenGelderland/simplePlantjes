<?php
include_once('classes/Database.php');

    $plantId = $_POST["id"];
    $time = strtotime("now");
    $sql = "UPDATE `plant` SET plantDatum =".$time.",zaad=0 WHERE id =".$plantId;
    Database::runInsert($sql);
    header("Location: plantjesLijst.php");

