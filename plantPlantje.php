<?php
include_once('Database.php');

    $plantId = $_POST["id"];
    $time = strtotime("now");
    $sql = "UPDATE `plant` SET kiemDatum =".$time.",zaad=0 WHERE id =".$plantId;
    echo $sql;
    Database::runInsert($sql);
    header("Location: plantjesLijst.php");

